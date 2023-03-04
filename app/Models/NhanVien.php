<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $fillable = [
        'tennv',
        'ngaysinh',
        'gioitinh',
        'cccd',
        'diachi',
        'sdt',
        'quequan',
        'maphongban',
        'machucvu',
        'makhoa',
        'anhdaidien',
        'trangthai',
        'hsl',
        'bacluong',
        'email'
    ];
    public function chucVu() {
        return $this->belongsTo(ChucVu::class, 'machucvu', 'id');
    }
    public function khoa() {
        return $this->belongsTo(Khoa::class, 'makhoa', 'id');
    }
    public function phongBan() {
        return $this->belongsTo(PhongBan::class, 'maphongban', 'id');
    }
    public function thongTinCaNhan($id = null) {
        if($id) {
            return NhanVien::select(DB::raw('*'))->where('id', $id)->first();
        } else {
            // return DB::raw('SELECT * FROM nhanvien WHERE id = ' . Auth::user()->manv) . ' LIMIT 1';
            // return NhanVien::select(DB::raw('*'))->where('id', Auth::user()->manv)->first();
            return NhanVien::select(DB::raw('*'))->where('id', 1001)->first();
        }
    }
}