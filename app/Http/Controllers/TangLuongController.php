<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TangLuongRequest;
use App\Models\TangLuong;
use Illuminate\Support\Facades\Auth;

class TangLuongController extends Controller
{
    protected $tangluong;
    protected $nhanvien;
    public function __construct()
    {
        $this->tangluong = new TangLuong();
        $this->nhanvien = new NhanVien;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $title = 'Danh sách tăng lương';
            $tangluongs = TangLuong::paginate(5);
            return view('tangluong.index', compact('tangluongs', 'title')); 
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm mới tăng lương';
        if (Auth::user()) {
            return view('tangluong.create', compact('title'));
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TangLuongRequest $request)
    {
        // dd($request);
        if ($request->file('upfile')) {
            $file = $request->file('upfile');
            $ext = $request->file('upfile')->extension();
            $file_name = time() . '-' . $request->manv . '.' . $ext;
            $publicPath = public_path('uploads/files');
            $file->move($publicPath, $file_name);
            TangLuong::create([
                'manv' => $request->manv,
                'ngaytangluong' => $request->ngaytangluong,
                'lydo' => $request->lydo,
                'chitiettangluong' => $file_name
            ]);
            return response()->json(["check" => true]);
        } else {
            return response()->json(['error' => ['upfile' => 'File bắt buộc phải nhập']]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Cập nhập tăng lương';
        if (Auth::user()) {
            $tangluong = TangLuong::find($id);
            return view('tangluong.edit', compact('tangluong', 'title'));
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TangLuongRequest $request, $id)
    {
        if ($request->file('upfile')) {
            $file = $request->file('upfile');
            $ext = $request->file('upfile')->extension();
            $file_name = time() . '-' . $request->manv . '.' . $ext;
            $publicPath = public_path('uploads/files');
            $file->move($publicPath, $file_name);

            $oldFile = TangLuong::select('chitiettangluong')->where('id', $id)->get()[0]->chitiettangluong;
            // dd($oldFile);
            TangLuong::where('id', $id)
                ->update([
                    'manv' => $request->manv,
                    'ngaytangluong' => $request->ngaytangluong,
                    'lydo' => $request->lydo,
                    'chitiettangluong' => $file_name
                ]);
            // Xoa file cu
            unlink(public_path('uploads/files/'.$oldFile));
            return response()->json(["check" => true]);
        } else {
            TangLuong::where('id', $id)
                ->update([
                    'manv' => $request->manv,
                    'ngaytangluong' => $request->ngaytangluong,
                    'lydo' => $request->lydo
                ]);
            return response()->json(["check" => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TangLuong::where('id', $id)->delete();
        $tangluong = TangLuong::find($id);
        if($tangluong) {
            return response()->json(['msg' => '']);
        } else {
            return response()->json(["check" => true]);
        }
    }

    public function search(Request $request)
    {
        $data = [
            'thang' => $request->thang,
            'nam' => $request->nam,
            'manv' => $this->formatInput($request->manv)
        ];
        if($data['thang'] && $data['nam'] && $data['manv']) {
            // dd($data);
            $tangluongs = TangLuong::select('*')
                ->whereMonth('ngaytangluong', $data['thang'])
                ->whereYear('ngaytangluong', $data['nam'])
                ->where('manv', $data['manv'])->paginate(5);
        } else if($data['thang'] && $data['manv']) {
            // dd($data);
            $tangluongs = TangLuong::select('*')
            ->whereMonth('ngaytangluong', $data['thang'])
            ->where('manv', $data['manv'])->paginate(5);
        } else if($data['nam'] && $data['manv']) {
            // dd($data);
            $tangluongs = TangLuong::select('*')
            ->whereYear('ngaytangluong', $data['nam'])
            ->where('manv', $data['manv'])->paginate(5);
        } else if($data['nam'] && $data['thang']) {
            // dd($data);
            $tangluongs = TangLuong::select('*')
            ->whereMonth('ngaytangluong', $data['thang'])
            ->whereYear('ngaytangluong', $data['nam'])->paginate(5);
        } else if($data['thang']) {
            // dd($data);
            $tangluongs = TangLuong::select('*')
                ->whereMonth('ngaytangluong', $data['thang'])->paginate(5);
        } else if($data['nam']) {
            // dd($data);
            $tangluongs = TangLuong::select('*')
            ->whereYear('ngaytangluong', $data['nam'])->paginate(5);
        } else if($data['manv']) {
            // dd($data);
            $tangluongs = TangLuong::select('*')
            ->where('manv', $data['manv'])->paginate(5);
        } else {
            return redirect()->route('tangluong.index');
        }
        return view('tangluong.index', compact('tangluongs', 'data'));
    }

    public function formatInput($input) {
        $output = str_replace(' ', '', $input);
        return trim($output);
    }
}
