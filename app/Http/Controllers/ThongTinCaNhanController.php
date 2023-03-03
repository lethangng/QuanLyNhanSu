<?php

namespace App\Http\Controllers;
use App\Models\ThongTinCaNhan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Http\Request;
// use App\Http\Requests\PublicRequest;
use Illuminate\Support\Facades\Hash;

class ThongTinCaNhanController extends Controller
{
    // public $caNhan = ThongTinCaNhan::select(DB::raw('*'))->where('User_id', '=', Auth::user()->id)->first();
    public function index() {
        $caNhan = ThongTinCaNhan::select(DB::raw('*'))->where('User_id', '=', Auth::user()->id)->first();
        // dd($caNhan);
        return view('nhanvien.thongtincanhan', compact('caNhan'));
    }

    public function chiTietLuong() {
        $caNhan = ThongTinCaNhan::select(DB::raw('*'))->where('User_id', '=', Auth::user()->id)->first();
        // dd($caNhan);
        return view('nhanvien.chiTietLuong', compact('caNhan'));
    }

    public function addPhoto(Request $request) {
        $caNhan = ThongTinCaNhan::select(DB::raw('*'))->where('User_id', '=', Auth::user()->id)->first();
        // dd($request);
        if($request->has('photo')) {
            // $request->validate([
            //     'photo' => 'required|mimes:png,jpg,jpeg|max:1024'
            // ]);

            $file = $request->photo;
            $ext = $request->photo->extension();
            $file_name = time().'-'.$caNhan->MaCaNhan.'.'.$ext;
            $file->move(public_path('uploads'), $file_name);
            // $request->merge(['image' => $file_name]);
            // dd($file_name);
            // dd($request->all());
            ThongTinCaNhan::where('User_id', '=', Auth::user()->id)
            ->update([
                'AnhDaiDien' => $file_name
            ]);
            toastr()->success('Sửa mật khẩu thành công.', 'Sửa thành công');
            return redirect()->route('canhan.index');
        } 
    }

    public function updatePassword(Request $request) {
        $caNhan = ThongTinCaNhan::select(DB::raw('*'))->where('User_id', '=', Auth::user()->id)->first();
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
     //qlns test
    public function index2()
    {
	        $caNhan = DB::select('SELECT thongtincanhan.id,HoTen,users.email,CCCD,GioiTinh,phongban.TenPhongBan,chucvu.TenChucVu,phongban.TenPhongBan,khoa.TenKhoa,TrangThai FROM thongtincanhan,users,chucvu,khoa,phongban WHERE thongtincanhan.ChucVu_id=chucvu.id and thongtincanhan.Khoa_id=khoa.id and thongtincanhan.PhongBan_id=phongban.id and thongtincanhan.User_id=users.id');

        return view('nhansu.danhsachnhanvien.danhsachnhanvien', ['caNhan' => $caNhan]);
    }
}