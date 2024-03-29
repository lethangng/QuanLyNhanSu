<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhenThuong;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\KhenThuongRequest;
use Hamcrest\Type\IsInteger;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Facades\Auth;

class KhenThuongController extends Controller
{
    protected $khenthuong;
    protected $nhanvien;
    public function __construct()
    {
        $this->khenthuong = new KhenThuong;
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
            $title = 'Danh sách khen thưởng';
            $khenthuongs = KhenThuong::paginate(5);
            // dd($khenthuongs);
            return view('khenthuong.index', compact('khenthuongs', 'title'));
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
        $title = 'Thêm mới khen thưởng';
        if (Auth::user()) {
            return view('khenthuong.create', compact('title'));
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
    public function store(KhenThuongRequest $request)
    {
        // dd($request);
        if ($request->file('upfile')) {
            $file = $request->file('upfile');
            $ext = $request->file('upfile')->extension();
            $file_name = time() . '-' . $request->manv . '.' . $ext;
            $publicPath = public_path('uploads/files');
            $file->move($publicPath, $file_name);
            KhenThuong::create([
                'manv' => $request->manv,
                'ngaykhenthuong' => $request->ngaykhenthuong,
                'lydo' => $request->lydo,
                'chitietkhenthuong' => $file_name
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
        $title = 'Cập nhập khen thưởng';
        if (Auth::user()) {
            $khenthuong = KhenThuong::find($id);
            return view('khenthuong.edit', compact('khenthuong', 'title'));
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
    public function update(KhenThuongRequest $request, $id)
    {
        if ($request->file('upfile')) {
            $file = $request->file('upfile');
            $ext = $request->file('upfile')->extension();
            $file_name = time() . '-' . $request->manv . '.' . $ext;
            $publicPath = public_path('uploads/files');
            $file->move($publicPath, $file_name);

            $oldFile = KhenThuong::select('chitietkhenthuong')->where('id', $id)->get()[0]->chitietkhenthuong;
            // dd($oldFile);
            KhenThuong::where('id', $id)
                ->update([
                    'manv' => $request->manv,
                    'ngaykhenthuong' => $request->ngaykhenthuong,
                    'lydo' => $request->lydo,
                    'chitietkhenthuong' => $file_name
                ]);
            // Xoa file cu
            unlink(public_path('uploads/files/' . $oldFile));
            return response()->json(["check" => true]);
        } else {
            KhenThuong::where('id', $id)
                ->update([
                    'manv' => $request->manv,
                    'ngaykhenthuong' => $request->ngaykhenthuong,
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
        KhenThuong::where('id', $id)->delete();
        $khenthuong = KhenThuong::find($id);
        if($khenthuong) {
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
        if ($data['thang'] && $data['nam'] && $data['manv']) {
            // dd($data);
            $khenthuongs = KhenThuong::select('*')
                ->whereMonth('ngaykhenthuong', $data['thang'])
                ->whereYear('ngaykhenthuong', $data['nam'])
                ->where('manv', $data['manv'])->paginate(5);
        } else if ($data['thang'] && $data['manv']) {
            // dd($data);
            $khenthuongs = KhenThuong::select('*')
                ->whereMonth('ngaykhenthuong', $data['thang'])
                ->where('manv', $data['manv'])->paginate(5);
        } else if ($data['nam'] && $data['manv']) {
            // dd($data);
            $khenthuongs = KhenThuong::select('*')
                ->whereYear('ngaykhenthuong', $data['nam'])
                ->where('manv', $data['manv'])->paginate(5);
        } else if ($data['nam'] && $data['thang']) {
            // dd($data);
            $khenthuongs = KhenThuong::select('*')
                ->whereMonth('ngaykhenthuong', $data['thang'])
                ->whereYear('ngaykhenthuong', $data['nam'])->paginate(5);
        } else if ($data['thang']) {
            // dd($data);
            $khenthuongs = KhenThuong::select('*')
                ->whereMonth('ngaykhenthuong', $data['thang'])->paginate(5);
        } else if ($data['nam']) {
            // dd($data);
            $khenthuongs = KhenThuong::select('*')
                ->whereYear('ngaykhenthuong', $data['nam'])->paginate(5);
        } else if ($data['manv']) {
            // dd($data);
            $khenthuongs = KhenThuong::select('*')
                ->where('manv', $data['manv'])->paginate(5);
        } else {
            return redirect()->route('khenthuong.index');
        }
        return view('khenthuong.index', compact('khenthuongs', 'data'));
    }

    public function findNameNv(Request $request)
    {
        // dd($request->dataId);
        if(!$request->dataId) {
            return response()->json(['check' => true, 'msg' => 'Vui lòng nhập mã nhân viên']);
        } else {
            $manv = $this->formatInput($request->dataId);
            if(!is_numeric($manv)) {
                return response()->json(['check' => true, 'msg' => 'Mã nhân viên không tồn tại', 'manv' => $manv]);
            }else {
                $user = NhanVien::where('id', $manv)->first();
                if($user) {
                    // Kiểm tra xem nhân viên ở trạng thái nghỉ việc không
                    $nhanvien = DB::select("SELECT nhanvien.id FROM nhanvien JOIN trangthai ON nhanvien.matrangthai = trangthai.id 
                    WHERE trangthai.matrangthai = 'NV' AND nhanvien.id = ".$manv);
                    if($nhanvien) {
                        return response()->json(['check' => true, 
                        "msg" => 'Nhân viên ở trạng thái nghỉ việc', 'manv' => $manv]);
                    }
                    return response()->json(['check' => false, 'msg' => $user->tennv, 'manv' => $manv]);
                }
            }
        }
    }

    public function formatInput($input) {
        $output = str_replace(' ', '', $input);
        return trim($output);
    }
}
