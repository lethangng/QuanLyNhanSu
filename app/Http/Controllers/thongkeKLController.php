<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class thongkeKLController extends Controller
{
    public function index()
    {
        $nam = Carbon::now()->year;
        $data_kiluat = [];
        for ($i = 1; $i < 7; $i++) {
            $data_kiluat[$i] = DB::table('kyluat')
                ->whereYear('ngaykyluat', ($i + ($nam - 6)))
                ->count();
        }
        $data = [
            ['năm', 'Số kỷ luật']
        ];
        for ($i = 1; $i < 7; $i++) {
            $data[] = [(string)($i + ($nam - 6)), $data_kiluat[$i]];
        }
        return view('thongke.thongkekyluat', compact('data',));
    }
    public function findYear(Request $request)
    {
        $nam = Carbon::now()->year;
        $nam1 = $request->nam1;
        $nam2 = $request->nam2;
        $data_kiluat = [];
        for ($i = 1; $i < ($nam2 - $nam1 + 2); $i++) {
            $data_kiluat[$i] = DB::table('kyluat')
                ->whereYear('ngaykyluat', ($nam1 - 1  + $i))
                ->count();
        }
        $data = [
            ['năm', 'Số kỷ luật']
        ];
        for ($i = 1; $i < ($nam2 - $nam1 + 2); $i++) {
            $data[] = [(string) ($nam1 - 1  + $i), $data_kiluat[$i]];
        }
        return view('thongke.thongkekyluat', compact('data',));
    }
}
