<?php

namespace App\Http\Controllers;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class NhanVienController extends Controller
{
    public function index2()
    {
        $caNhan = NhanVien::paginate(5);
        $phongBan= DB::select('SELECT id,tenphongban from phongban');
        $khoa= DB::select('SELECT id,tenkhoa from khoa');
        $chucVu= DB::select('SELECT id,tenchucvu from chucvu');
        $trangThai= DB::select('SELECT id,tentrangthai from trangthai');
        return view('nhansu.danhsachnhanvien.danhsachnhanvien', ['caNhan' => $caNhan,'trangThai' => $trangThai,'phongBan' => $phongBan,'khoa' => $khoa,'chucVu' => $chucVu]);
    }
    public function create(){
        $phongBan=DB::select('SELECT id,tenphongban from phongBan');
        $khoa= DB::select('SELECT id,tenkhoa from khoa');
        $chucVu= DB::select('SELECT id,tenchucvu from chucvu');
        $trangThai= DB::select('SELECT id,tentrangthai from trangthai');
        return view('nhansu.danhsachnhanvien.themmoinhanvien',['trangThai' => $trangThai,'phongBan' => $phongBan,'khoa' => $khoa,'chucVu' => $chucVu]);
    }
    public function store(Request $request)
    {
        $nhanVien=new NhanVien;
        $nhanVien->tennv=$request->hoten;
        $nhanVien->ngaysinh=$request->ngaysinh;
        $nhanVien->gioitinh=$request->gioitinh;
        $nhanVien->cccd=$request->cccd;
        $nhanVien->diachi=$request->diachi;
        $nhanVien->email=$request->email;
        $nhanVien->hsl=$request->hsl;
        $nhanVien->quequan=$request->quequan;
        $nhanVien->sdt=$request->sodienthoai;
        $nhanVien->maphongban=$request->phongban;
        $nhanVien->machucvu=$request->chucvu;
        $nhanVien->makhoa=$request->khoa;
        $nhanVien->matrangthai=$request->trangthai;
        $nhanVien->bacluong=$request->bacluong;
        $nhanVien->save();
        return redirect()->route('danhsachnhanvien');
    }
    public function destroy(Request $request)
    {
        $nhanVien = NhanVien::find($request->idxoa);
        $nhanVien->matrangthai=1;
        $nhanVien->update();
        return redirect('danhsachnhanvien');
    }
    public function edit($id)
    {
        $caNhan=NhanVien::find($id);
        $phongBan= DB::select('SELECT id,tenphongban from phongban');
        $khoa= DB::select('SELECT id,tenkhoa from khoa');
        $chucVu= DB::select('SELECT id,tenchucvu from chucvu');
        $trangThai= DB::select('SELECT id,tentrangthai from trangthai');
        return view('nhansu.danhsachnhanvien.suanhanvien', ['trangThai' => $trangThai,'caNhan' => $caNhan,'phongBan' => $phongBan,'khoa' => $khoa,'chucVu' => $chucVu]);
    }
    public function update(Request $request,$id)
    {
        $nhanVien = NhanVien::find($id);
        $nhanVien->tennv=$request->hoten;
        $nhanVien->ngaysinh=$request->ngaysinh;
        $nhanVien->gioitinh=$request->gioitinh;
        $nhanVien->cccd=$request->cccd;
        $nhanVien->diachi=$request->diachi;
        $nhanVien->email=$request->email;
        $nhanVien->hsl=$request->hsl;
        $nhanVien->quequan=$request->quequan;
        $nhanVien->sdt=$request->sodienthoai;
        $nhanVien->maphongban=$request->phongban;
        $nhanVien->machucvu=$request->chucvu;
        $nhanVien->makhoa=$request->khoa;
        $nhanVien->matrangthai=$request->trangthai;
        $nhanVien->bacluong=$request->bacluong;
        $nhanVien->update();
        return redirect('danhsachnhanvien');
    }
    public function locphongban($id)
    {
        $caNhan = NhanVien::where('maphongban','=',$id)->paginate(5);
        $phongBan= DB::select('SELECT id,tenphongban from phongban');
        $khoa= DB::select('SELECT id,tenkhoa from khoa');
        $chucVu= DB::select('SELECT id,tenchucvu from chucvu');
        $trangThai= DB::select('SELECT id,tentrangthai from trangthai');
        return view('nhansu.danhsachnhanvien.danhsachnhanvien', ['caNhan' => $caNhan,'trangThai' => $trangThai,'phongBan' => $phongBan,'khoa' => $khoa,'chucVu' => $chucVu]);
    }
    public function locchucvu($id)
    {
        $caNhan = NhanVien::where('machucvu','=',$id)->paginate(5);
        $phongBan= DB::select('SELECT id,tenphongban from phongban');
        $khoa= DB::select('SELECT id,tenkhoa from khoa');
        $chucVu= DB::select('SELECT id,tenchucvu from chucvu');
        $trangThai= DB::select('SELECT id,tentrangthai from trangthai');
        return view('nhansu.danhsachnhanvien.danhsachnhanvien', ['caNhan' => $caNhan,'trangThai' => $trangThai,'phongBan' => $phongBan,'khoa' => $khoa,'chucVu' => $chucVu]);
    }
    public function lockhoa($id)
    {
        $caNhan = NhanVien::where('makhoa','=',$id)->paginate(5);
        $phongBan= DB::select('SELECT id,tenphongban from phongban');
        $khoa= DB::select('SELECT id,tenkhoa from khoa');
        $chucVu= DB::select('SELECT id,tenchucvu from chucvu');
        $trangThai= DB::select('SELECT id,tentrangthai from trangthai');
        return view('nhansu.danhsachnhanvien.danhsachnhanvien', ['caNhan' => $caNhan,'trangThai' => $trangThai,'phongBan' => $phongBan,'khoa' => $khoa,'chucVu' => $chucVu]);
    }
}
