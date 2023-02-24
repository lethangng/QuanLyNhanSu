<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function findRoleId($id)
    {
        $user = DB::table('thongtincanhan')->where('User_id', $id)->get();
        foreach ($user as $data) {
            return $this->roleId = $data->MaChucVu;
        }
    }
    public function updateToken($str)
    {
        $this::update([
            'token' => $str
        ]);
    }
    public function updatePass($str)
    {
        $this::update([
            // 'token' => '',
            'password' => bcrypt($str),
        ]);
    }
    public function convertToModel($users)
    {
        foreach ($users->get() as $data) {
            return $data;
        };
    }
    protected $fillable = [
        'name',
        'email',
        'password',
        'roleId',
        'token'
    ];
    public function controller($roleId)
    {
        if ($roleId == 1) {
            return response()->json(['error_check' => false, 'url' => "/quanlynhanvien"]);
        } else if ($roleId == 2) {
            return response()->json(['error_check' => false, 'url' => "/nhanvien"]);
        } else if ($roleId == 3) {
            return response()->json(['error_check' => false, 'url' => "/nhanvien"]);
        } else if ($roleId == 4) {
            return response()->json(['error_check' => false, 'url' => "/nhansu"]);
        } else {
            return response()->json(['error_check' => false, 'url' => ""]);
        }
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
