<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhenThuong;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\KhenThuongRequest;
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
            $khenthuongs = KhenThuong::paginate(3);
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
            redirect()->route('login');
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
            toastr()->success('Thêm thành công.', 'Thành công');
            return redirect()->route('khenthuong.index');
        } else {
            return redirect()->route('khenthuong.index');
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
            return view('nhansu.khenThuong_CaNhan.edit', compact('khenthuong', 'title'));
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
            KhenThuong::where('id', $id)
                ->update([
                    'manv' => $request->manv,
                    'ngaykhenthuong' => $request->ngaykhenthuong,
                    'lydo' => $request->lydo,
                    'chitietkhenthuong' => $file_name
                ]);
            return redirect()->route('khenthuong.index');
        } else {
            return redirect()->route('khenthuong.index');
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
        toastr()->success('Xóa thành công.', 'Thành công');
        return redirect()->route('khenthuong.index');
    }

    public function search(Request $request)
    {
        $data = [
            'thang' => $request->thang,
            'nam' => $request->nam,
            'manv' => $request->manv
        ];
        // dd($data);
        // Tìm ra trong bảng khenthuong có id nào gióng với id của manv bên trên
        $khenthuongs = KhenThuong::select('*')
            ->whereMonth('ngaykhenthuong', $request->thang)
            ->orwhereYear('ngaykhenthuong', $request->nam)
            ->orwhere('manv', $request->manv)->paginate(5);
        return view('khenthuong.index', compact('khenthuongs', 'data'));
    }

    public function findNameNv(Request $request)
    {
        if ($user = NhanVien::where('id', $request->dataId)->first())
            return response()->json(['check' => false, 'msg' => $user->tennv]);
        return response()->json(['check' => true, 'msg' => 'Mã nhân viên không tồn tại']);
    }
}
