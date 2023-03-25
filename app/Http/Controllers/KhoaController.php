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

        $patt="/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳýỵỷỹ\s]+)$/i";
        if(!preg_match($patt,$request->makhoa) || !preg_match($patt,$request->tenkhoa) ){
            if($request->makhoa=="" || $request->tenkhoa==""){
                return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
            }
            else{
                return redirect()->back()->with('message', 'Phải nhập đúng kiểu ký tự');
            }
        }
        else{
            if( DB::select("SELECT id from khoa where makhoa='".$request->makhoa."'")!=null || DB::select("SELECT id from khoa where tenkhoa='".$request->tenkhoa."'")!=null){
                return redirect()->back()->with('message', 'Mã khoa hoặc tên khoa đã tồn tại');
            }
            else{
                $khoa=new Khoa;
                $khoa->makhoa=$request->makhoa;
                $khoa->tenkhoa=$request->tenkhoa;
                $khoa->save();
                return redirect()->back()->with('message2', 'thongbao');
            }
        }
    }
    public function edit($id)
    {
        $khoa=Khoa::find($id);
        return view('nhansu.danhsachkhoa.suakhoa', ['khoa' => $khoa]);
    }
    public function update(Request $request,$id)
    {

        $patt="/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳýỵỷỹ\s]+)$/i";
        if(!preg_match($patt,$request->makhoa) || !preg_match($patt,$request->tenkhoa) ){
            if($request->makhoa=="" || $request->tenkhoa==""){
                return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
            }
            else{
                return redirect()->back()->with('message', 'Phải nhập đúng kiểu ký tự');
            }
        }
        else{
            $cn=Khoa::find($id);
            if($cn->makhoa==$request->makhoa && $cn->tenkhoa==$request->tenkhoa){//trung  cũ
                $khoa = Khoa::find($id);
                $khoa->makhoa=$request->makhoa;
                $khoa->tenkhoa=$request->tenkhoa;
                $khoa->update();
                return redirect()->back()->with('message2', 'thongbao');

            }
            elseif(DB::select("SELECT * from khoa where makhoa='".$request->makhoa."'"." EXCEPT SELECT * from khoa where id ='".$id."'")!=null || DB::select("SELECT * from khoa where tenkhoa='".$request->tenkhoa."'"." EXCEPT SELECT * from khoa where id ='".$id."'")!=null){//trung
                return redirect()->back()->with('message', 'Mã khoa hoặc tên khoa đã tồn tại');
            }
            else{
                $khoa = Khoa::find($id);
                $khoa->makhoa=$request->makhoa;
                $khoa->tenkhoa=$request->tenkhoa;
                $khoa->update();
                return redirect()->back()->with('message2', 'thongbao');
            }

        }


    }
    public function destroy(Request $request)
    {
        $khoa = Khoa::find($request->idxoa);
        $khoa->delete();
        return redirect()->back()->with('message2', 'thongbao');
    }
    public function timkhoa(Request $request){
        $patt="/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳýỵỷỹ\s]+)$/i";
        if(!preg_match($patt,$request->tenkhoa) ){
            if($request->tenkhoa==""){
                return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
            }
            else{
                return redirect()->back()->with('message', 'Phải nhập đúng kiểu ký tự');
            }
        }
        else{
            $str=trim($request->tenkhoa);
            $str = preg_replace('/\s+/', ' ', $str);
            $khoa=Khoa::where('tenkhoa','like','%'.$str.'%')->paginate(5);
            return view('nhansu.danhsachkhoa.danhsachkhoa',['khoa'=>$khoa]);
        }
    }
}
