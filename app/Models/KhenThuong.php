<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;

class KhenThuong extends Model
{
    use HasFactory;

    protected $table = 'khenthuong';

    protected $fillable = [
        'manv',
        'ngaykhenthuong',
        'lydo',
        'chitietkhenthuong'
    ];

    public function nhanvien() {
        return $this->belongsTo(NhanVien::class, 'manv', 'id');
    }
}
