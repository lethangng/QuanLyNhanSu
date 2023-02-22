<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thongtincanhan extends Model
{
    use HasFactory;
    protected $table = "chucvu";
    protected $fillable = ["MaChucVu", "TenChucVu", "LuongCoBan"];
}
