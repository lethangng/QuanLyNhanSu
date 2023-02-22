<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thongtincanhan extends Model
{
    use HasFactory;
    protected $table = "thongtincanhan";
    protected $fillable = ["MaCaNhan", "HoTen", "NgaySinh", "GioiTinh", "CCDD", "DiaChi", "MaPhongBan", "MaChucVu", "MaKhoa", "AnhDaiDien", "TrangThai", "User_id"];
}
