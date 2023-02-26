<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    use HasFactory;
    protected $table = 'luong';
    protected $fillable = [
        'ThongTinCaNhan_id',
        'HSL',
        'Thang',
        'TongTienPhat',
        'TongTienThuong',
        'TongTienLuong'
    ];
}