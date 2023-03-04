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

class NhanVienController extends Controller
{
    protected $nhanvien;
    public function __construct(){
        $this->nhanvien = new NhanVien;
    }
    public function index() {
        // if(Auth::user()->manv){
            $title = 'Thông tin cá nhân';
            $canhan = $this->nhanvien->thongTincanhan();
            return view('thongtincanhan', compact('canhan', 'title'));
        // } else {
        //     return abort(404);
        // }
    }

    public function addPhoto(Request $request) {
        $canhan = $this->nhanvien->thongTincanhan();
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
                // $file->move(public_path('uploads'), $file_name);
                // NhanVien::where('id', $id)
                // ->update([
                //     'anhdaidien' => $file_name
                // ]);
                return response()->json(["check" => true]);
            } else {
                return response()->json(['error' => $validator->errors()]);
            }

        }
    }

    public function updatePassword(Request $request) {
        $canhan = $this->nhanvien->thongTincanhan();
        $matKhauCu = Auth::user()->password;
        if(Hash::check($request->MatKhauCu, $matKhauCu)) {
            User::where('id', $canhan->id)
            ->update([
                'password' => Hash::make($request->MatKhauMoi)
            ]);
        }
        toastr()->success('Sửa mật khẩu thành công.', 'Sửa thành công');
        return redirect()->route('canhan.index');
    }

    public function upfile(Request $request) {
        if($request->has('upfile')) {
            $file = $request->file('upfile');
            $ext = $request->file('upfile')->extension();
            $file_name = time().''.'.'.$ext;
            $publicPath = public_path('uploads/files');
            $file->move($publicPath, $file_name);
            toastr()->success('Tải lên thành công.', 'Thành công');
            return redirect()->route('canhan.index');
        } else {
            toastr()->success('Tải lên thất bại.', 'Thất bại');
        }
    }
}