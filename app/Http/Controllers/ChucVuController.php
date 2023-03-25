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
        $patt="/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i";
        if(!preg_match($patt,$request->machucvu) || !preg_match($patt,$request->tenchucvu) ){
            if($request->machucvu=="" || $request->tenchucvu==""){
                return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
            }
            else{
                return redirect()->back()->with('message', 'Phải nhập đúng kiểu ký tự');
            }
        }
        else{
            if( DB::select("SELECT id from chucvu where machucvu='".$request->machucvu."'")!=null || DB::select("SELECT id from chucvu where tenchucvu='".$request->tenchucvu."'")!=null){
                return redirect()->back()->with('message', 'Mã chức vụ hoặc tên chức vụ đã tồn tại');
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
        $patt="/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i";
        if(!preg_match($patt,$request->machucvu) || !preg_match($patt,$request->tenchucvu) ){
            if($request->machucvu=="" || $request->tenchucvu==""){
                return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
            }
            else{
                return redirect()->back()->with('message', 'Phải nhập đúng kiểu ký tự');
            }
        }
        else{
            $cn=ChucVu::find($id);
            if($cn->machucvu==$request->machucvu && $cn->tenchucvu==$request->tenchucvu){//trung  cũ
                $chucvu = ChucVu::find($id);
                $chucvu->machucvu=$request->machucvu;
                $chucvu->tenchucvu=$request->tenchucvu;
                $chucvu->update();
                return redirect()->back()->with('message2', 'thongbao');
            }
            elseif( DB::select("SELECT * from chucvu where machucvu='".$request->machucvu."'"." EXCEPT SELECT * from chucvu where id ='".$id."'")!=null || DB::select("SELECT * from chucvu where tenchucvu='".$request->tenchucvu."'"." EXCEPT SELECT * from chucvu where id ='".$id."'")!=null){
                return redirect()->back()->with('message', 'Mã chức vụ hoặc tên chức vụ đã tồn tại');
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
        return redirect()->back()->with('message2', 'thongbao');
    }
    public function timchucvu(Request $request){
        $patt="/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i";
        if(!preg_match($patt,$request->tenchucvu) ){
            if($request->tenchucvu==""){
                return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
            }
            else{
                return redirect()->back()->with('message', 'Phải nhập đúng kiểu ký tự');
            }
        }
        else{
            $chucvu=ChucVu::where('tenchucvu','like','%'.$request->tenchucvu.'%')->paginate(5);
            return view('nhansu.danhsachchucvu.danhsachchucvu',['chucvu'=>$chucvu]);
        }

    }
}
