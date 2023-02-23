<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KhenThuong_ThongTinCaNhan;

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
}