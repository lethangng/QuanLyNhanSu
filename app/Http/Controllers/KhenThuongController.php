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
    public function __construct(){
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
        if(Auth::user()) {
            $title = 'Danh sách khen thưởng';
            $khenthuongs = KhenThuong::paginate(5);
            return view('khenthuong.index', compact('khenthuongs', 'title')); 
        } else {
            return view('login.login');
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
        return view('khenthuong.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KhenThuongRequest $request)
    {
        // $nhanvien = $this->nhanvien->info($request->manv);
        if($request->file('upfile')) {
            $file = $request->file('upfile');
            $ext = $request->file('upfile')->extension();
            $file_name = time().'-'.$request->manv.'.'.$ext;
            $publicPath = public_path('uploads/files');
            $file->move($publicPath, $file_name);
            // KhenThuong::create([
            //     'manv' => $request->manv,
            //     'ngaykhenthuong' => $request->NgayKhenThuong,
            //     'lydo' => $request->Lydo,
            //     'chitietkhenthuong' => $file_name
            // ]);
            return redirect()->route('canhan.index');
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
        $khenThuong_CaNhans = KhenThuong::find($id);
        $khenThuongs = KhenThuong::all();
        $caNhans = NhanVien::select(DB::raw('id, HoTen'))->get();
        // dd($khenthuong);
        // return view('nhansu.khenThuong_CaNhan.edit', compact('khenThuong_CaNhans', 'title', 'khenThuongs', 'caNhans'));
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
        // dd($request);
        KhenThuong::where('id', $id)
        ->update([
            'KhenThuong_id' => $request->KhenThuong_id,
            'NhanVien_id' => $request->NhanVien_id,
            'NgayKhenThuong' => $request->NgayKhenThuong,
            'ChiTietKhenThuong' => $request->ChiTietKhenThuong
        ]);
        $hoTen = NhanVien::select('HoTen')->where('id', '=', $request->NhanVien_id)->first()->HoTen;
        // dd($hoTen);
        toastr()->success('Sửa khen thưởng '. $hoTen .' thành công.', 'Sửa thành công');
        return redirect()->route('khenthuong_canhan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        KhenThuong::where('id', $id)->delete();
        toastr()->success('Xóa khen thưởng '. $request->HoTen . ' thành công.', 'Xóa thành công');

        return redirect()->route('khenthuong_canhan.index');
    }

    public function search(Request $request) {
        $caNhans = NhanVien::select(DB::raw('id, HoTen'))->get();
        // dd($request);
        $data = [
            'Thang' => $request->Thang,
            'Nam' => $request->Nam,
            'HoTen' => $request->HoTen
        ];
        // dd($data['Thang']);
        // dd($data);

        // Lấy ra các NhanVien_id trong bảng khenthuong khi biết HoTen trong bảng NhanVien
        $NhanVien_ids = KhenThuong::select('NhanVien_id')
        ->join('NhanVien', 'KhenThuong.NhanVien_id', '=', 'NhanVien.id')
        ->where('NhanVien.HoTen', '=', $request->HoTen)->get();
        // dd($NhanVien_ids);

        // Tìm ra trong bảng khenthuong có id nào gióng với id của NhanVien_id bên trên
        $khenThuong_CaNhans = KhenThuong::select('*')
        ->whereMonth('NgayKhenThuong', $request->Thang)
        ->orwhereYear('NgayKhenThuong', $request->Nam)
        ->orwhereIn('NhanVien_id', $NhanVien_ids)->paginate(5);
        // dd($khenThuong_CaNhans);
        return view('nhansu.khenThuong_CaNhan.index', compact('khenThuong_CaNhans', 'data', 'caNhans'));
    }
}
