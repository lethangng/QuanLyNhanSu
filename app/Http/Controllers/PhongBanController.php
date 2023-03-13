<?php

namespace App\Http\Controllers;
use App\Models\PhongBan;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PhongBanController extends Controller
{

    public function index(){
        $phongban=PhongBan::paginate(5);
        return view('nhansu.danhsachphongban.danhsachphongban',['phongban'=>$phongban]);
    }
    public function store(Request $request)
    {
        $phongban=new PhongBan;
        $phongban->maphongban=$request->maphongban;
        $phongban->tenphongban=$request->tenphongban;
        $phongban->save();
        return redirect()->route('danhsachphongban');
    }
    public function edit($id)
    {
        $phongban=PhongBan::find($id);
        return view('nhansu.danhsachphongban.suaphongban', ['phongban' => $phongban]);
    }
    public function update(Request $request,$id)
    {
        $phongban = PhongBan::find($id);
        $phongban->maphongban=$request->maphongban;
        $phongban->tenphongban=$request->tenphongban;
        $phongban->update();
        return redirect('danhsachphongban');
    }
    public function destroy(Request $request)
    {
        $phongban = PhongBan::find($request->idxoa);
        $phongban->delete();
        return redirect('danhsachphongban');
    }
    public function timphongban($name){
        $phongban=PhongBan::where('tenphongban','like','%'.$name.'%')->paginate(5);
        return view('nhansu.danhsachphongban.danhsachphongban',['phongban'=>$phongban]);
    }
}
