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

        if($request->machucvu=="" || $request->tenchucvu==""){
            return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
        }
        else{
            if( DB::select("SELECT id from chucvu where machucvu='".$request->machucvu."'")!=null){
                return redirect()->back()->with('message', 'Mã chức vụ đã tồn tại');
            }
            else{
                $chucvu=new ChucVu;
                $chucvu->machucvu=$request->machucvu;
                $chucvu->tenchucvu=$request->tenchucvu;
                $chucvu->save();
                return redirect()->back()->with('message2', 'thongbao');
            }
        }
    }
    public function edit($id)
    {
        $chucvu=ChucVu::find($id);
        return view('nhansu.danhsachchucvu.suachucvu', ['chucvu' => $chucvu]);
    }
    public function update(Request $request,$id)
    {


        if($request->machucvu=="" || $request->tenchucvu==""){
            return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
        }
        else{
            $cn=ChucVu::find($id);
            if($cn->machucvu==$request->machucvu){//trung  cũ
                $chucvu = ChucVu::find($id);
                $chucvu->machucvu=$request->machucvu;
                $chucvu->tenchucvu=$request->tenchucvu;
                $chucvu->update();
                return redirect()->back()->with('message2', 'thongbao');
            }
            elseif( DB::select("SELECT id from chucvu where machucvu='".$request->machucvu."'")!=null){//trung
                return redirect()->back()->with('message', 'Mã chức vụ đã tồn tại');
            }
            else{
                $chucvu = ChucVu::find($id);
                $chucvu->machucvu=$request->machucvu;
                $chucvu->tenchucvu=$request->tenchucvu;
                $chucvu->update();
                return redirect()->back()->with('message2', 'thongbao');
            }

        }


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
