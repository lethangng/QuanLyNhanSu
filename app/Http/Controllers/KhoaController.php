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

        if($request->makhoa=="" || $request->tenkhoa==""){
            return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
        }
        else{
            if( DB::select("SELECT id from khoa where makhoa='".$request->makhoa."'")!=null){
                return redirect()->back()->with('message', 'Mã khoa đã tồn tại');
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

        if($request->makhoa=="" || $request->tenkhoa==""){
            return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
        }
        else{
            $cn=Khoa::find($id);
            if($cn->makhoa==$request->makhoa){//trung  cũ
                $khoa = Khoa::find($id);
                $khoa->makhoa=$request->makhoa;
                $khoa->tenkhoa=$request->tenkhoa;
                $khoa->update();
                return redirect()->back()->with('message2', 'thongbao');

            }
            elseif( DB::select("SELECT id from khoa where makhoa='".$request->makhoa."'")!=null){//trung
                return redirect()->back()->with('message', 'Mã khoa đã tồn tại');
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
        return redirect('danhsachkhoa');
    }
    public function timkhoa(Request $request){
        $patt="/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/i";
        if(!preg_match($patt,$request->tenkhoa) ){
            if($request->tenkhoa==""){
                return redirect()->back()->with('message', 'Phải nhập đủ thông tin');
            }
            else{
                return redirect()->back()->with('message', 'Phải nhập đúng kiểu ký tự');
            }
        }
        else{
        $khoa=Khoa::where('tenkhoa','like','%'.$request->tenkhoa.'%')->paginate(5);
        return view('nhansu.danhsachkhoa.danhsachkhoa',['khoa'=>$khoa]);
        }
    }
}
