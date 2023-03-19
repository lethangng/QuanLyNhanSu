<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TangLuong;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class thongkeKTController extends Controller
{
    public function index()
    {
        $nam = Carbon::now()->year;
        $data_khenthuong = [];
        for ($i = 1; $i < 7; $i++) {
            $data_khenthuong[$i] = DB::table('khenthuong')
                ->whereYear('ngaykhenthuong', ($i + ($nam - 6)))
                ->count();
        }
        $data = [
            ['năm', 'Số khen thưởng']
        ];
        for ($i = 1; $i < 7; $i++) {
            $data[] = [(string)($i + ($nam - 6)), $data_khenthuong[$i]];
        }
        return view('thongke.thongkekhenthuong', compact('data',));
    }
    public function findYear(Request $request)
    {
        $nam = Carbon::now()->year;
        $nam1 = $request->nam1;
        $nam2 = $request->nam2;
        $data_khenthuong = [];
        for ($i = 1; $i < ($nam2 - $nam1 + 2); $i++) {
            $data_khenthuong[$i] = DB::table('khenthuong')
                ->whereYear('ngaykhenthuong', ($nam1 - 1  + $i))
                ->count();
        }
        $data = [
            ['năm', 'Số khen thưởng']
        ];
        for ($i = 1; $i < ($nam2 - $nam1 + 2); $i++) {
            $data[] = [(string) ($nam1 - 1  + $i), $data_khenthuong[$i]];
        }
        return view('thongke.thongkekhenthuong', compact('data',));
    }
}
