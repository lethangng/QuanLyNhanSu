<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\KyLuat;
// use App\Models\ThongTinCaNhan;

class KyLuat_ThongTinCaNhan extends Model
{
    use HasFactory;

    protected $table = 'kyluat_thongtincanhan';

    protected $fillable = [
        'KyLuat_id',
        'ThongTinCaNhan_id',
        'NgayKyLuat',
        'ChiTietKyLuat'
    ];
    public function kyLuat() {
        return $this->belongsTo(KyLuat::class, 'KyLuat_id', 'id');
    }
    public function thongTinCaNhan() {
        return $this->belongsTo(ThongTinCaNhan::class, 'ThongTinCaNhan_id', 'id');
    }
}
