<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KyLuat extends Model
{
    use HasFactory;

    protected $table = 'kyluat';
    protected $fillable = [
        'TenKyLuat',
        'TienPhat'
    ];
}