<?php

namespace App\Http\Controllers;
use App\Models\ThongTinCaNhan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Http\Request;
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
        return view('nhanvien.chiTietLuong', compact('caNhan'));
    }

    public function addPhoto(Request $request) {
        $caNhan = ThongTinCaNhan::select(DB::raw('*'))->where('User_id', '=', Auth::user()->id)->first();
        if($request->has('photo')) {
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
            return redirect()->route('canhan.index')->with('message', 'Sửa thành công.');
        } else {
            return redirect()->route('canhan.index');
        }
    }

    public function updatePassword(Request $request) {
        $caNhan = ThongTinCaNhan::select(DB::raw('*'))->where('User_id', '=', Auth::user()->id)->first();
        $matKhauCu = Auth::user()->password;
        if(Hash::check($request->MatKhauCu, $matKhauCu)) {
            User::where('id', $caNhan->User_id)
            ->update([
                'passwork' => Hash::make($request->MatKhauMoi)
            ]);
        }
        return redirect()->route('canhan.index')->with('message', 'Sửa thành công.');
    }
}