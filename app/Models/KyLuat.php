<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NhanVien;

class KyLuat extends Model
{
    use HasFactory;

    protected $table = 'kyluat';

    protected $fillable = [
        'manv',
        'ngaykyluat',
        'lydo',
        'chitietkyluat'
    ];

    public function nhanvien() {
        return $this->belongsTo(NhanVien::class, 'manv', 'id');
    }
}
