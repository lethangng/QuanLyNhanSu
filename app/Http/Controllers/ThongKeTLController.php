<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TangLuong;

class ThongKeTLController extends Controller
{
    protected $tangluong;
    public function __construct()
    {
        $this->tangluong = new TangLuong();
    }
    public function thongke(Request $request) {
        if(Auth::user()) {
            if($request->nam) {
                $data_tangluong = $this->tangluong->thongke($request->nam);
                // dd($data_tangluong);
                $nam = $request->nam;
                $data = [
                    ['Tháng', 'Số nhân viên']
                ];
                // dd($data);
                for($i = 1; $i <13; $i++) {
                    $data[] = [(string)$i, $data_tangluong[$i]];
                }
                // dd($data);
                return view('thongke.thongketangluong', compact('data', 'nam'));
            } 
        } else {
            return redirect()->route('login');
        }
        // return view('thongke.thongketangluong');
    }
}
