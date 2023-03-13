<?php

namespace App\Http\Controllers;
use App\Models\ChucVu;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ChucVuController extends Controller
{

    public function index(){
        $chucvu=ChucVu::paginate(5);
        return view('nhansu.danhsachchucvu.danhsachchucvu',['chucvu'=>$chucvu]);
    }
    public function store(Request $request)
    {
        $chucvu=new ChucVu;
        $chucvu->machucvu=$request->machucvu;
        $chucvu->tenchucvu=$request->tenchucvu;
        $chucvu->save();
        return redirect()->route('danhsachchucvu');
    }
    public function edit($id)
    {
        $chucvu=ChucVu::find($id);
        return view('nhansu.danhsachchucvu.suachucvu', ['chucvu' => $chucvu]);
    }
    public function update(Request $request,$id)
    {
        $chucvu = ChucVu::find($id);
        $chucvu->machucvu=$request->machucvu;
        $chucvu->tenchucvu=$request->tenchucvu;
        $chucvu->update();
        return redirect('danhsachchucvu');
    }
    public function destroy(Request $request)
    {
        $chucvu = ChucVu::find($request->idxoa);
        $chucvu->delete();
        return redirect('danhsachchucvu');
    }
    public function timchucvu($name){
        $chucvu=ChucVu::where('tenchucvu','like','%'.$name.'%')->paginate(5);
        return view('nhansu.danhsachchucvu.danhsachchucvu',['chucvu'=>$chucvu]);
    }
}
