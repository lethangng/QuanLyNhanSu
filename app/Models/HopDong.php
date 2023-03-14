<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;
use Carbon\Carbon;

class HopDong extends Model
{
    use HasFactory;

    protected $table = 'hopdong';

    protected $fillable = [
        'manv',
        'ngaybatdau',
        'ngaykethuc',
        'tenhopdong',
        'chitietkhenthuong'
    ];

    public function nhanvien() {
        return $this->belongsTo(NhanVien::class, 'manv', 'id');
    }

    public function thongkehethan($year=null) {
        return $this::select('*')->whereYear('ngayketthuc', '<=', $year)->get();
    }
    public function conhan($year=null) {
        return $this::whereYear('ngayketthuc', '>=', $year)
        ->orWhereNull('ngayketthuc')->count();
    }
}
