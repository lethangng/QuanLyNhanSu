<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;

class TangLuong extends Model
{
    use HasFactory;

    protected $table = 'tangluong';

    protected $fillable = [
        'manv',
        'ngaytangluong',
        'lydo',
        'chitiettangluong'
    ];

    public function nhanvien() {
        return $this->belongsTo(NhanVien::class, 'manv', 'id');
    }
}
