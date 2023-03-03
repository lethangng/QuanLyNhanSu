<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;

class Nghi extends Model
{
    use HasFactory;

    protected $table = 'nghi';

    protected $fillable = [
        'manv',
        'ngaynghi',
        'lydo',
        'chitietnghilam'
    ];

    public function nhanvien() {
        return $this->belongsTo(NhanVien::class, 'manv', 'id');
    }
}
