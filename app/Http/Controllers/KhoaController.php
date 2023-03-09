<?php

namespace App\Http\Controllers;
use App\Models\Khoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KhoaController extends Controller
{
    public function index(){
        $khoa=Khoa::all();
        return view('nhansu.danhsachkhoa.danhsachkhoa',['khoa'=>$khoa]);
    }
}
