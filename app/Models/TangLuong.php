<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;

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

    public function thongke($year) {
        $data = [];
        for($i = 1; $i < 13; $i++) {
            $data[$i] = DB::table('tangluong')
            ->whereYear('ngaytangluong', $year)
            ->whereMonth('ngaytangluong', $i)
            ->count();
        }
        return $data;
    }
}
