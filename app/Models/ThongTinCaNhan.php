<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\KhenThuong_ThongTinCaNhan;

class ThongTinCaNhan extends Model
{
    use HasFactory;
    protected $table = 'thongtincanhan';
    protected $fillable = [
        'MaCaNhan',
        'HoTen',
        'NgaySinh',
        'GioiTinh',
        'CCCD',
        'DiaChi',
        'PhongBan_id',
        'ChucVu_id',
        'Khoa_id',
        'AnhDaiDien',
        'TrangThai',
        'User_id'
    ];
    public function khenThuong_ThongTinCaNhan() {
        return $this->hasMany(KhenThuong_ThongTinCaNhan::class, 'id', 'ThongTinCaNhan_id');
    }

    public function chucVu() {
        return $this->belongsTo(ChucVu::class, 'ChucVu_id', 'id');
    }

    public function khoa() {
        return $this->belongsTo(Khoa::class, 'Khoa_id', 'id');
    }

    public function phongBan() {
        return $this->belongsTo(PhongBan::class, 'PhongBan_id', 'id');
    }

    public function luong() {
        return $this->belongsTo(Luong::class, 'id', 'ThongTinCaNhan_id');
    }
}