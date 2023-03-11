<?php

namespace App\Http\Controllers;
use App\Models\Khoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KhoaController extends Controller
{
    public function index(){
        $khoa=Khoa::paginate(5);
        return view('nhansu.danhsachkhoa.danhsachkhoa',['khoa'=>$khoa]);
    }
    public function store(Request $request)
    {
        $khoa=new Khoa;
        $khoa->makhoa=$request->makhoa;
        $khoa->tenkhoa=$request->tenkhoa;
        $khoa->save();
        return redirect()->route('danhsachkhoa');
    }
    public function edit($id)
    {
        $khoa=Khoa::find($id);
        return view('nhansu.danhsachkhoa.suakhoa', ['khoa' => $khoa]);
    }
    public function update(Request $request,$id)
    {
        $khoa = Khoa::find($id);
        $khoa->makhoa=$request->makhoa;
        $khoa->tenkhoa=$request->tenkhoa;
        $khoa->update();
        return redirect('danhsachkhoa');
    }
    public function destroy(Request $request)
    {
        $khoa = Khoa::find($request->idxoa);
        $khoa->delete();
        return redirect('danhsachkhoa');
    }
    public function timkhoa($name){
        $khoa=Khoa::where('tenkhoa','like','%'.$name.'%')->paginate(5);
        return view('nhansu.danhsachkhoa.danhsachkhoa',['khoa'=>$khoa]);
    }
}
