<?php

namespace App\Http\Controllers;
use App\Models\NhanVien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Http\Request;
// use App\Http\Requests\PublicRequest;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    protected $nhanvien;
    protected $canhan;
    public function __construct(){
        $this->nhanvien = new NhanVien;
        $this->canhan = $this->nhanvien->thongTinCaNhan();
    }
    public function index() {
        $title = 'Thông tin cá nhân';
        // dd(Auth::user());
        // $canhan = DB::raw('SELECT * FROM nhanvien WHERE id = ' . Auth::user()->manv . ' LIMIT 1');
        // $canhan = DB::select('SELECT * FROM nhanvien WHERE id = ' . 1 . ' LIMIT 1')[0];
        // dd($canhan);
        $canhan = $this->canhan;
        return view('thongtincanhan', compact('canhan', 'title'));
    }

    public function addPhoto(Request $request, $id) {
        $canhan = $this->canhan;
        // dd($request);
        if($request->has('photo')) {
            $file = $request->photo;
            $ext = $request->photo->extension();
            $file_name = time().'-'.$canhan->id.'.'.$ext;
            $file->move(public_path('uploads'), $file_name);
            NhanVien::where('id', $id)
            ->update([
                'anhdaidien' => $file_name
            ]);
            toastr()->success('Sửa ảnh đại diện thành công.', 'Sửa thành công');
            return redirect()->route('canhan.index');
        } else {
            toastr()->success('Tải lên thất bại', 'Thất bại');
        }
    }

    public function updatePassword(Request $request) {
        $caNhan = NhanVien::select(DB::raw('*'))->where('User_id', '=', Auth::user()->id)->first();
        $matKhauCu = Auth::user()->password;
        if(Hash::check($request->MatKhauCu, $matKhauCu)) {
            User::where('id', $caNhan->User_id)
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