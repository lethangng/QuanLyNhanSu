<?php

namespace App\Http\Controllers;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\PublicRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ThongTinController extends Controller
{
    protected $nhanvien;
    public function __construct(){
        $this->nhanvien = new NhanVien;
    }
    public function index($id = null) {
        $title = 'Thông tin cá nhân';
        if(Auth::user()){
            if($id) {
                $canhan = $this->nhanvien->info($id);
            } else {
                $canhan = $this->nhanvien->info(Auth::user()->manv);
            }
            return view('thongtincanhan', compact('canhan', 'title', 'id'));
        } else {
            return redirect()->route('login');
        }
    }

    public function addPhoto(Request $request, $id) {
        $canhan = $this->nhanvien->info($id);
        $messsages = array(
            'required' => ':attribute bắt buộc phải nhập',
            'mimes' => ':attribute phải là ảnh đuôi png, jpg hoặc jpeg',
            'max' => ':attribute phải nhỏ hơn 1 MB',
        );
        $rules = array(
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:1024'
        );
        $attributes = [
            'photo' => 'Ảnh'
        ];
        if($request->file('photo')) {
            $validator = Validator::make($request->all(), $rules, $messsages, $attributes);
            if ($validator->passes()) {
                $file = $request->photo;
                $ext = $request->photo->extension();
                $file_name = time().'-'.$canhan->id.'.'.$ext;
                $file->move(public_path('uploads/images'), $file_name);

                $oldFile = NhanVien::select('anhdaidien')->where('id', $id)->get()[0]->anhdaidien;
                NhanVien::where('id', $id)
                ->update([
                    'anhdaidien' => $file_name
                ]);
                unlink(public_path('uploads/images/'.$oldFile));
                return response()->json(["check" => true]);
            } else {
                return response()->json(['error' => $validator->errors()]);
            } 
        }
    }

    public function updatePassword(Request $request) {
        $matKhauCu = Auth::user()->password;
        if(Hash::check($request->matkhaucu, $matKhauCu)) {
            if($request->matkhaumoi == $request->nhaplai) {
                User::where('id', Auth::user()->id)
                ->update([
                    'password' => Hash::make($request->matkhaumoi)
                ]);
                return response()->json(["check" => true]);
            }
            return response()->json(['error' => '']);
        } else {
            return response()->json(['error' => 'Mật khẩu không chính xác']);
        }
    }

    public function upfile(Request $request) {
        if($request->has('upfile')) {
            $file = $request->file('upfile');
            $ext = $request->file('upfile')->extension();
            $file_name = time().''.'.'.$ext;
            $publicPath = public_path('uploads/files');
            $file->move($publicPath, $file_name);
            // toastr()->success('Tải lên thành công.', 'Thành công');
            return redirect()->route('canhan.index', ['id' => Auth::user()->manv]);
        } else {
            toastr()->success('Tải lên thất bại.', 'Thất bại');
        }
    }
}