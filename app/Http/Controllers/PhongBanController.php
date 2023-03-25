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

        $patt="/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳýỵỷỹ\s]+)$/i";
        if(!preg_match($patt,$request->maphongban) || !preg_match($patt,$request->tenphongban) ){
            if($request->maphongban=="" || $request->tenphongban==""){
                return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
            }
            else{
                return redirect()->back()->with('message', 'Phải nhập đúng kiểu ký tự');
            }
        }
        else{
            if( DB::select("SELECT id from phongban where maphongban='".$request->maphongban."'")!=null || DB::select("SELECT id from phongban where tenphongban='".$request->tenphongban."'")!=null){
                return redirect()->back()->with('message', 'Mã phòng ban hoặc tên phòng ban đã tồn tại');
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

        $patt="/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳýỵỷỹ\s]+)$/i";
        if(!preg_match($patt,$request->maphongban) || !preg_match($patt,$request->tenphongban) ){
            if($request->maphongban=="" || $request->tenphongban==""){
                return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
            }
            else{
                return redirect()->back()->with('message', 'Phải nhập đúng kiểu ký tự');
            }
        }
        else{
            $cn=PhongBan::find($id);
            if($cn->maphongban==$request->maphongban && $cn->tenphongban==$request->tenphongban){//trung  cũ
                $phongban = PhongBan::find($id);
                $phongban->maphongban=$request->maphongban;
                $phongban->tenphongban=$request->tenphongban;
                $phongban->update();
                return redirect()->back()->with('message2', 'thongbao');

            }
            elseif(DB::select("SELECT * from phongban where maphongban='".$request->maphongban."'"." EXCEPT SELECT * from phongban where id ='".$id."'")!=null || DB::select("SELECT * from phongban where tenphongban='".$request->tenphongban."'"." EXCEPT SELECT * from phongban where id ='".$id."'")!=null){//trung
                return redirect()->back()->with('message', 'Mã phòng ban hoặc tên phòng ban đã tồn tại');
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
        return redirect()->back()->with('message2', 'thongbao');
    }
    public function timphongban(Request $request){
        $patt="/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳýỵỷỹ\s]+)$/i";
        if(!preg_match($patt,$request->tenphongban) ){
            if($request->tenphongban==""){
                return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
            }
            else{
                return redirect()->back()->with('message', 'Phải nhập đúng kiểu ký tự');
            }
        }
        else{
            $str=trim($request->tenphongban);
            $str = preg_replace('/\s+/', ' ', $str);
            $phongban=PhongBan::where('tenphongban','like','%'.$str.'%')->paginate(5);
            return view('nhansu.danhsachphongban.danhsachphongban',['phongban'=>$phongban]);
        }
    }
}
