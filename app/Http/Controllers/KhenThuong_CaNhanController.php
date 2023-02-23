<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhenThuong_ThongTinCaNhan;
use App\Models\KhenThuong;
use App\Models\ThongTinCaNhan;
use Illuminate\Support\Facades\DB;

class KhenThuong_CaNhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khenThuong_CaNhans = KhenThuong_ThongTinCaNhan::paginate(5);
        $title = 'Danh sách khen thưởng của nhân viên';
        // dd($khenThuong_Luongs);
        return view('nhansu.khenThuong_CaNhan.index', compact('khenThuong_CaNhans', 'title')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm mới khen thưởng của nhân viên';
        $khenThuongs = KhenThuong::all();
        $caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
        return view('nhansu.khenThuong_CaNhan.create', compact('title', 'khenThuongs', 'caNhans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KhenThuong_ThongTinCaNhan::create([
            'KhenThuong_id' => $request->KhenThuong_id,
            'ThongTinCaNhan_id' => $request->ThongTinCaNhan_id,
            'NgayKhenThuong' => $request->NgayKhenThuong,
            'ChiTietKhenThuong' => $request->ChiTietKhenThuong
        ]);
        return redirect()->route('khenthuong_canhan.index')->with('message', 'Thêm mới thành công.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Cập nhập khen thưởng của nhân viên';
        $khenThuong_CaNhans = KhenThuong_ThongTinCaNhan::find($id);
        $khenThuongs = KhenThuong::all();
        $caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
        // dd($khenthuong);
        return view('nhansu.khenThuong_CaNhan.edit', compact('khenThuong_CaNhans', 'title', 'khenThuongs', 'caNhans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        KhenThuong_ThongTinCaNhan::where('id', $id)
        ->update([
            'KhenThuong_id' => $request->KhenThuong_id,
            'ThongTinCaNhan_id' => $request->ThongTinCaNhan_id,
            'NgayKhenThuong' => $request->NgayKhenThuong,
            'ChiTietKhenThuong' => $request->ChiTietKhenThuong
        ]);
        return redirect()->route('khenthuong_canhan.index')->with('message', 'Sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KhenThuong_ThongTinCaNhan::where('id', $id)->delete();
        return redirect()->route('khenthuong_canhan.index')->with('message', 'Xóa thành công.');
    }

    public function search(Request $request) {
        $data = [
            'Thang' => $request->Thang,
            'Nam' => $request->Nam,
            'HoTen' => $request->HoTen
        ];
        $thongTinCaNhan_ids = KhenThuong_ThongTinCaNhan::select('ThongTinCaNhan_id')
        ->join('thongtincanhan', 'KhenThuong_ThongTinCaNhan.ThongTinCaNhan_id', '=', 'thongtincanhan.id')
        ->where('thongtincanhan.HoTen', '=', $request->HoTen);
        // dd($luong_id);

        $khenThuong_CaNhans = KhenThuong_ThongTinCaNhan::select('*')
        ->whereMonth('NgayKhenThuong', $request->Thang)
        ->orwhereYear('NgayKhenThuong', $request->Nam)
        ->orwhereIn('ThongTinCaNhan_id', $thongTinCaNhan_ids)->paginate(5);
        // dd($khenThuong_Luongs);
        return view('nhansu.khenThuong_CaNhan.index', compact('khenThuong_CaNhans', 'data'));
    }
}
