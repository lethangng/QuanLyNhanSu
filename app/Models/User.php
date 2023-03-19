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
use App\Models\NhanVien;

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
        $user = DB::table('nhanvien')->where('machucvu', $id)->get();
        foreach ($user as $data) {
            return $this->roleId = $data->machucvu;
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
            'token' => '',
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
        'token',
        'manv'
    ];

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
    public function nhanvien()
    {
        return $this->belongsTo(NhanVien::class, 'manv', 'id');
    }
    public function updateUser($email, $pass)
    {
        $this::update([
            'email' => $email,
            'password' => bcrypt($pass),
        ]);
    }
    public function insertUser($manv, $email, $pass)
    {
        $this::insert([
            'manv' => $manv,
            'email' => $email,
            'password' => bcrypt($pass),
        ]);
    }
    public function searchElm()
    {
        return ' <tr class="">
        <th class="h1" scope="row"> ' . $this->id . ' </th>
        <th class="h1" scope="row"> ' . $this->manv . ' </th>
        <th class="h1" scope="row"> ' . $this->nhanvien->tennv . ' </th>
        <th class="h1" scope="row"> ' . $this->email . ' </th>
        <th class="h1" scope="row">******</th>
        <th class="h1" scope="row">
            <a href="' . route('suataikhoan', ['id' => $this->id]) . '">
                <button class="i-edit">
                    <i class="bx bx-edit"></i>
                </button>
            </a>
            <a href="#">
                <button class="i-rotate js-buy-ticket">
                    <i class="bx bx-trash"></i>
                </button>
            </a>
        </th>
        </tr>     ';
    }
    public function checkRoleInUser($id)
    {
        $user = NhanVien::where('id', $id)->first();
        if ($user->maphongban == 2 && $user->machucvu == 3) {
            return true;
        }
        return false;
    }
}
