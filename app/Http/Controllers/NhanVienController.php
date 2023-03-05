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
        $caNhan = DB::select('SELECT id,tennv,email,cccd,gioitinh,machucvu,maphongban,makhoa,trangthai from nhanvien');
        $phongBan= DB::select('SELECT id,tenphongban from phongban');
        $khoa= DB::select('SELECT id,tenkhoa from khoa');
        $chucVu= DB::select('SELECT id,tenchucvu from chucvu');
        return view('nhansu.danhsachnhanvien.danhsachnhanvien', ['caNhan' => $caNhan,'phongBan' => $phongBan,'khoa' => $khoa,'chucVu' => $chucVu]);
    }
    public function create(){
        $phongBan=DB::select('SELECT id,tenphongban from phongBan');
        $khoa= DB::select('SELECT id,tenkhoa from khoa');
        $chucVu= DB::select('SELECT id,tenchucvu from chucvu');
        return view('nhansu.danhsachnhanvien.themmoinhanvien',['phongBan' => $phongBan,'khoa' => $khoa,'chucVu' => $chucVu]);
    }
}
