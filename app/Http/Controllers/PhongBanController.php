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

        if($request->maphongban=="" || $request->tenphongban==""){
            return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
        }
        else{
            if( DB::select("SELECT id from phongban where maphongban='".$request->maphongban."'")!=null){
                return redirect()->back()->with('message', 'Mã phòng ban đã tồn tại');
            }
            else{
                $phongban=new PhongBan;
                $phongban->maphongban=$request->maphongban;
                $phongban->tenphongban=$request->tenphongban;
                $phongban->save();
                return redirect()->back()->with('message2', 'thongbao');
            }
        }


    }
    public function edit($id)
    {
        $phongban=PhongBan::find($id);
        return view('nhansu.danhsachphongban.suaphongban', ['phongban' => $phongban]);
    }
    public function update(Request $request,$id)
    {

        if($request->maphongban=="" || $request->tenphongban==""){
            return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
        }
        else{
            $cn=PhongBan::find($id);
            if($cn->maphongban==$request->maphongban){//trung  cũ
                $phongban = PhongBan::find($id);
                $phongban->maphongban=$request->maphongban;
                $phongban->tenphongban=$request->tenphongban;
                $phongban->update();
                return redirect()->back()->with('message2', 'thongbao');

            }
            elseif( DB::select("SELECT id from phongban where maphongban='".$request->maphongban."'")!=null){//trung
                return redirect()->back()->with('message', 'Mã chức vụ đã tồn tại');
            }
            else{
                $phongban = PhongBan::find($id);
                $phongban->maphongban=$request->maphongban;
                $phongban->tenphongban=$request->tenphongban;
                $phongban->update();
                return redirect()->back()->with('message2', 'thongbao');

            }

        }
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
