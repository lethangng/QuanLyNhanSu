<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HopDongRequest;
use App\Models\HopDong;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ThongKeHDController extends Controller
{
    protected $hopdong;
    public function __construct()
    {
        $this->hopdong = new HopDong();
    }
    public function thongke(Request $request) {
        $hopdongs = $this->hopdong->thongkehethan($request->nam);
        // dd($hopdong);
        // dd($hopdong);
        $hethan = count($hopdongs);
        // dd($hethan);
        $conhan = $this->hopdong->conhan($request->nam);
        $nam = $request->nam;
        $data = [
            ['Task', 'Hours per Day'],
            ['Còn hạn', $conhan],
            ['Hết hạn', $hethan]
        ];
        return view('thongke.thongkehopdong', compact('data', 'hopdongs', 'nam'));
    }
}
