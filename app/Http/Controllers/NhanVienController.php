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
        $caNhan = DB::select('SELECT nhanvien.id,tennv,email,cccd,gioitinh,machucvu,maphongban,makhoa,trangthai from nhanvien');
        return view('nhansu.danhsachnhanvien.danhsachnhanvien', ['caNhan' => $caNhan]);
    }
}
