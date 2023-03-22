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
        'ngayketthuc',
        'tenhopdong',
        'chitiethopdong'
    ];

    public function nhanvien() {
        return $this->belongsTo(NhanVien::class, 'manv', 'id');
    }

    public function thongkehethan($year=null) {
        $today = Carbon::today();
        // Nếu năm nhập vào nhỏ hơn năm hiện tại thì chỉ cần truy vấn các bản ghi 
        // có năm của ngayketthuc bằng năm nhập vào là được
        if($year < $today->year) {
            return $this::select('*')->whereYear('ngayketthuc', $year)->get();
            // Nếu năm nhập vào bằng năm hiện tại thì phải lấy ra các bản ghi có ngayketthuc bằng năm hiện tại 
            // và ngayketthuc phải nhỏ hơn ngày hiện tại
        } else if($year == $today->year) {
            return $this::select('*')->whereYear('ngayketthuc', $year)->whereDate('ngayketthuc', '<=', $today)->get();
        } else {
            return null;
        }
    }
    public function conhan($year=null) {
        $today = Carbon::today();
        // Nếu năm nhập vào nhỏ hơn năm hiện tại thì chỉ cần truy vấn 
        // các bản ghi có năm của ngayketthuc lớn hơn là được
        if($year < $today->year) {
            return $this::whereYear('ngayketthuc', '>=', $year)->orWhereNull('ngayketthuc')->count();
            // Nếu năm nhập vào bằng năm hiện tại thì phải lấy ra các bản ghi có ngayketthuc lớn hơn ngày hiện tại
        } else if($year == $today->year) {
            return $this::whereDate('ngayketthuc', '>=', $today)->orWhereNull('ngayketthuc')->count();
        } else {
            return null;
        }
    }
}
