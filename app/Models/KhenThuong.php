<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KhenThuong_ThongTinCaNhan;

class KhenThuong extends Model
{
    use HasFactory;

    protected $table = 'khenthuong';
    protected $fillable = [
        'TenKhenThuong',
        'TienThuong'
    ];
    // public function khenThuong_ThongTinCaNhan() {
    //     return $this->hasMany(KhenThuong_ThongTinCaNhan::class, 'id', 'KhenThuong_id');
    // }
}