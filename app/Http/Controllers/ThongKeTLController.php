<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TangLuong;
use Carbon\Carbon;

class ThongKeTLController extends Controller
{
    protected $tangluong;
    public function __construct()
    {
        $this->tangluong = new TangLuong();
    }
    public function index() {
        if(Auth::user()) {
            $nam = Carbon::now()->year;
            $data_tangluong = $this->tangluong->thongke($nam);
            $data = [
                ['Tháng', 'Số nhân viên']
            ];
            for($i = 1; $i <13; $i++) {
                $data[] = [(string)$i, $data_tangluong[$i]];
            }
            return view('thongke.thongketangluong', compact('data', 'nam'));
        } else {
            return redirect()->route('login');
        }
    }
    public function thongke(Request $request) {
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
    }
}
