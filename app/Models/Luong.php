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
    public function thongTinCaNhan() {
        return $this->belongsTo(ThongTinCaNhan::class, 'ThongTinCaNhan_id', 'id');
    }
    // public function chucVu() {
    //     return $this->belongsTo(ChucVu::class, 'ThongTinCaNhan_id', 'id');
    // }
}