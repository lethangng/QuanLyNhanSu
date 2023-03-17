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
        if($request->hoten=="" || $request->ngaysinh=="" || $request->gioitinh=="" || $request->cccd=="" || $request->diachi=="" || $request->email=="" || $request->hsl=="" || $request->quequan=="" || $request->sodienthoai=="" || $request->phongban=="" || $request->chucvu==""  || $request->khoa=="" || $request->trangthai=="" || $request->bacluong==""){
            return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
        }
        else{
            if( DB::select('SELECT id from nhanvien where cccd='.$request->cccd)!=null){
                return redirect()->back()->with('message', 'Căn cước công dân đã tồn tại');
            }
            else{
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
                return redirect()->back()->with('message2', 'thongbao');
            }

        }
    }
    public function destroy(Request $request)
    {

        $nhanVien = NhanVien::find($request->idxoa);
        $nhanVien->matrangthai=1;
        $nhanVien->update();

        /*
        $affected = DB::table('nhanvien')->where('id', $request->idxoa)->update(['matrangthai' => 1]);
        */
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

        if($request->hoten=="" || $request->ngaysinh=="" || $request->gioitinh=="" || $request->cccd=="" || $request->diachi=="" || $request->email=="" || $request->hsl=="" || $request->quequan=="" || $request->sodienthoai=="" || $request->phongban=="" || $request->chucvu==""  || $request->khoa=="" || $request->trangthai=="" || $request->bacluong==""){
            return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
        }
        else{
            $cn=NhanVien::find($id);
            if($cn->cccd==$request->cccd){//trung cccd cũ
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
                return redirect()->back()->with('message2', 'thongbao');
            }
            elseif( DB::select('SELECT id from nhanvien where cccd='.$request->cccd)!=null){//trung cccd
                return redirect()->back()->with('message', 'Căn cước công dân đã tồn tại');
            }
            else{
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
                return redirect()->back()->with('message2', 'thongbao');
            }

        }
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
    public function timnhanvien($name)
    {
        $caNhan = NhanVien::where('tennv','like','%'.$name.'%')->paginate(5);
        $phongBan= DB::select('SELECT id,tenphongban from phongban');
        $khoa= DB::select('SELECT id,tenkhoa from khoa');
        $chucVu= DB::select('SELECT id,tenchucvu from chucvu');
        $trangThai= DB::select('SELECT id,tentrangthai from trangthai');
        return view('nhansu.danhsachnhanvien.danhsachnhanvien', ['caNhan' => $caNhan,'trangThai' => $trangThai,'phongBan' => $phongBan,'khoa' => $khoa,'chucVu' => $chucVu]);
    }
    public function thongkenhanvien()
    {
        $result=DB::select('select tenchucvu,count(tenchucvu) as sochucvu from nhanvien,chucvu where nhanvien.machucvu=chucvu.id group by tenchucvu;');
        $data="";
        foreach ($result as $val){
            $data.="['".$val->tenchucvu."',    ".$val->sochucvu."],";
        }
        $chartData=$data;

        $result=DB::select('select tentrangthai,count(tentrangthai) as sotrangthai from nhanvien,trangthai where nhanvien.matrangthai=trangthai.id group by tentrangthai;');
        $data="";
        foreach ($result as $val){
            $data.="['".$val->tentrangthai."',    ".$val->sotrangthai."],";
        }
        $chartData2=$data;

        $result=DB::select('select gioitinh,COUNT(gioitinh) as sogioitinh from nhanvien group by gioitinh;');
        $data="";
        foreach ($result as $val){
            $data.="['".$val->gioitinh."',    ".$val->sogioitinh."],";
        }
        $chartData3=$data;
        return view('thongke.thongkenhanvien',compact('chartData','chartData2','chartData3'));
    }
}
