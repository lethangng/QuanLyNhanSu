<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KhenThuong;
use App\Models\ThongTinCaNhan;

class KhenThuong_ThongTinCaNhan extends Model
{
    use HasFactory;

    protected $table = 'khenthuong_thongtincanhan';

    protected $fillable = [
        'KhenThuong_id',
        'ThongTinCaNhan_id',
        'NgayKhenThuong',
        'ChiTietKhenThuong'
    ];
    public function khenThuong() {
        return $this->belongsTo(KhenThuong::class, 'KhenThuong_id', 'id');
    }
    public function thongTinCaNhan() {
        return $this->belongsTo(ThongTinCaNhan::class, 'ThongTinCaNhan_id', 'id');
    }
}
