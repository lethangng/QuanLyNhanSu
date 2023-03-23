<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicRequest;
use Illuminate\Http\Request;
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
    public function index() {
        if(Auth::user()) {
            $nam = Carbon::now()->year;
            $hopdongs = $this->hopdong->thongkehethan($nam);
            $hethan = count($hopdongs);
            $conhan = $this->hopdong->conhan($nam);
            $data = [
                ['Trạng thái', 'Số lượng'],
                ['Còn hạn', $conhan],
                ['Đã hết hạn', $hethan]
            ];
            return view('thongke.thongkehopdong', compact('data', 'hopdongs', 'nam'));
        } else {
            return redirect()->route('login');
        }
    }
    public function thongke(PublicRequest $request) {
        if($request->nam) { 
            $hopdongs = $this->hopdong->thongkehethan($request->nam);
            // dd($hopdongs);
            $hethan = count($hopdongs);
            $conhan = $this->hopdong->conhan($request->nam);
            // dd($conhan);
            $nam = $request->nam;
            $data = [
                ['Task', 'Số lượng'],
                ['Còn hạn', $conhan],
                ['Đã hết hạn', $hethan]
            ];
            return view('thongke.thongkehopdong', compact('data', 'hopdongs', 'nam'));
        } else {
            return redirect()->route('thongke.hopdong');
        }
    }
}
