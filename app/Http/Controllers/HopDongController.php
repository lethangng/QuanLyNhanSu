<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HopDongRequest;
use App\Models\HopDong;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class HopDongController extends Controller
{
    protected $hopdong;
    protected $nhanvien;
    public function __construct()
    {
        $this->hopdong = new HopDong();
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
            $title = 'Danh sách hợp đồng lao động';
            $hopdongs = HopDong::paginate(5);
            return view('hopdong.index', compact('hopdongs', 'title')); 
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
        $title = 'Thêm mới hợp đồng';
        if (Auth::user()) {
            return view('hopdong.create', compact('title'));
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
    public function store(HopDongRequest $request)
    {
        if($request->ngayketthuc) {
            try {
                $ngayketthuc = Carbon::parse($request->ngayketthuc);
            } catch(Exception $e) {
                return response()->json(['error' => ['ngayketthuc' => 'Định dạng ngày tháng không đúng']]);
            }
            $ngaybatdau = Carbon::parse($request->ngaybatdau);
            if($ngaybatdau->greaterThan($ngayketthuc)) {
                return response()->json(['error' => ['ngaybatdau' => 'Ngày bắt đầu phải nhỏ hơn ngày kết thúc']]);
            }
        }
        if ($request->file('upfile')) {
            $file = $request->file('upfile');
            $ext = $request->file('upfile')->extension();
            $file_name = time() . '-' . $request->manv . '.' . $ext;
            $publicPath = public_path('uploads/files');
            $file->move($publicPath, $file_name);
            HopDong::create([
                'manv' => $request->manv,
                'ngaybatdau' => $request->ngaybatdau,
                'ngayketthuc' => $request->ngayketthuc,
                'chitiethopdong' => $file_name
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
        $title = 'Cập nhập hợp đồng';
        if (Auth::user()) {
            $hopdong = HopDong::find($id);
            return view('hopdong.edit', compact('hopdong', 'title'));
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
    public function update(HopDongRequest $request, $id)
    {
        if($request->ngayketthuc) {
            try {
                $ngayketthuc = Carbon::parse($request->ngayketthuc);
            } catch(Exception $e) {
                return response()->json(['error' => ['ngayketthuc' => 'Định dạng ngày tháng không đúng']]);
            }
            $ngaybatdau = Carbon::parse($request->ngaybatdau);
            // $ngayketthuc = Carbon::parse($request->ngayketthuc);
            if($ngaybatdau->greaterThan($ngayketthuc)) {
                return response()->json(['error' => ['ngaybatdau' => 'Ngày bắt đầu phải nhỏ hơn ngày kết thúc']]);
            }
        }
        if ($request->file('upfile')) {
            $file = $request->file('upfile');
            $ext = $request->file('upfile')->extension();
            $file_name = time() . '-' . $request->manv . '.' . $ext;
            $publicPath = public_path('uploads/files');
            $file->move($publicPath, $file_name);

            $oldFile = HopDong::select('chitiethopdong')->where('id', $id)->get()[0]->chitiethopdong;
            // dd($oldFile);
            HopDong::where('id', $id)
                ->update([
                    'manv' => $request->manv,
                    'ngaybatdau' => $request->ngaybatdau,
                    'ngayketthuc' => $request->ngayketthuc,
                    'chitiethopdong' => $file_name
                ]);
            // Xoa file cu
            unlink(public_path('uploads/files/'.$oldFile));
            return response()->json(["check" => true]);
        } else {
            HopDong::where('id', $id)
                ->update([
                    'manv' => $request->manv,
                    'ngaybatdau' => $request->ngaybatdau,
                    'ngayketthuc' => $request->ngayketthuc
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
        HopDong::where('id', $id)->delete();
        $hopdong = HopDong::find($id);
        if($hopdong) {
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
            $hopdongs = HopDong::select('*')
                ->whereMonth('ngaybatdau', $data['thang'])
                ->whereYear('ngaybatdau', $data['nam'])
                ->where('manv', $data['manv'])->paginate(5);
        } else if($data['thang'] && $data['manv']) {
            $hopdongs = HopDong::select('*')
            ->whereMonth('ngaybatdau', $data['thang'])
            ->where('manv', $data['manv'])->paginate(5);
        } else if($data['nam'] && $data['manv']) {
            $hopdongs = HopDong::select('*')
            ->whereYear('ngaybatdau', $data['nam'])
            ->where('manv', $data['manv'])->paginate(5);
        } else if($data['nam'] && $data['thang']) {
            $hopdongs = HopDong::select('*')
            ->whereMonth('ngaybatdau', $data['thang'])
            ->whereYear('ngaybatdau', $data['nam'])->paginate(5);
        } else if($data['thang']) {
            $hopdongs = HopDong::select('*')
                ->whereMonth('ngaybatdau', $data['thang'])->paginate(5);
        } else if($data['nam']) {
            $hopdongs = HopDong::select('*')
            ->whereYear('ngaybatdau', $data['nam'])->paginate(5);
        } else if($data['manv']) {
            $hopdongs = HopDong::select('*')
            ->where('manv', $data['manv'])->paginate(5);
        } else {
            return redirect()->route('hopdong.index');
        }
        return view('hopdong.index', compact('hopdongs', 'data'));
    }
    public function formatInput($input) {
        $output = str_replace(' ', '', $input);
        return trim($output);
    }
}
