<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HopDong;
use Illuminate\Support\Facades\Auth;

class ThongKeHDController extends Controller
{
    protected $hopdong;
    public function __construct()
    {
        $this->hopdong = new HopDong();
    }
    public function thongke(Request $request) {
        if(Auth::user()) {
            if($request->nam) {
                $hopdongs = $this->hopdong->thongkehethan($request->nam);
                $hethan = count($hopdongs);
                $conhan = $this->hopdong->conhan($request->nam);
                $nam = $request->nam;
                $data = [
                    ['Task', 'Số lượng'],
                    ['Còn hạn', $conhan],
                    ['Đã hết hạn', $hethan]
                ];
                return view('thongke.thongkehopdong', compact('data', 'hopdongs', 'nam'));
            } 
        } else {
            return redirect()->route('login');
        }
    }
}
