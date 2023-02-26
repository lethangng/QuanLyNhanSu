<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhenThuong_ThongTinCaNhan;
use App\Models\KhenThuong;
use App\Models\ThongTinCaNhan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\KhenThuong_CaNhanRequest;
class KhenThuong_CaNhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Danh sách khen thưởng của nhân viên';
        $khenThuong_CaNhans = KhenThuong_ThongTinCaNhan::paginate(5);
        $caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
        return view('nhansu.khenThuong_CaNhan.index', compact('khenThuong_CaNhans', 'title', 'caNhans')); 
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
    public function store(KhenThuong_CaNhanRequest $request)
    {
        KhenThuong_ThongTinCaNhan::create([
            'KhenThuong_id' => $request->KhenThuong_id,
            'ThongTinCaNhan_id' => $request->ThongTinCaNhan_id,
            'NgayKhenThuong' => $request->NgayKhenThuong,
            'ChiTietKhenThuong' => $request->ChiTietKhenThuong
        ]);

        $hoTen = ThongTinCaNhan::select('HoTen')->where('id', '=', $request->ThongTinCaNhan_id)->first()->HoTen;
        toastr()->success('Thêm khen thưởng cho nhân viên '. $hoTen .' thành công.', 'Thêm thành công');
        return redirect()->route('khenthuong_canhan.index');
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
    public function update(KhenThuong_CaNhanRequest $request, $id)
    {
        // dd($request);
        KhenThuong_ThongTinCaNhan::where('id', $id)
        ->update([
            'KhenThuong_id' => $request->KhenThuong_id,
            'ThongTinCaNhan_id' => $request->ThongTinCaNhan_id,
            'NgayKhenThuong' => $request->NgayKhenThuong,
            'ChiTietKhenThuong' => $request->ChiTietKhenThuong
        ]);
        $hoTen = ThongTinCaNhan::select('HoTen')->where('id', '=', $request->ThongTinCaNhan_id)->first()->HoTen;
        // dd($hoTen);
        toastr()->success('Sửa khen thưởng của nhân viên '. $hoTen .' thành công.', 'Sửa thành công');
        return redirect()->route('khenthuong_canhan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        KhenThuong_ThongTinCaNhan::where('id', $id)->delete();
        toastr()->success('Xóa khen thưởng của nhân viên '. $request->HoTen . ' thành công.', 'Xóa thành công');

        return redirect()->route('khenthuong_canhan.index');
    }

    public function search(Request $request) {
        $caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
        // dd($request);
        $data = [
            'Thang' => $request->Thang,
            'Nam' => $request->Nam,
            'HoTen' => $request->HoTen
        ];
        // dd($data['Thang']);
        // dd($data);

        // Lấy ra các ThongTinCaNhan_id trong bảng khenthuong_thongtincanhan khi biết HoTen trong bảng thongtincanhan
        $thongTinCaNhan_ids = KhenThuong_ThongTinCaNhan::select('ThongTinCaNhan_id')
        ->join('thongtincanhan', 'KhenThuong_ThongTinCaNhan.ThongTinCaNhan_id', '=', 'thongtincanhan.id')
        ->where('thongtincanhan.HoTen', '=', $request->HoTen)->get();
        // dd($thongTinCaNhan_ids);

        // Tìm ra trong bảng khenthuong_thongtincanhan có id nào gióng với id của thongtincanhan_id bên trên
        $khenThuong_CaNhans = KhenThuong_ThongTinCaNhan::select('*')
        ->whereMonth('NgayKhenThuong', $request->Thang)
        ->orwhereYear('NgayKhenThuong', $request->Nam)
        ->orwhereIn('ThongTinCaNhan_id', $thongTinCaNhan_ids)->paginate(5);
        // dd($khenThuong_CaNhans);
        return view('nhansu.khenThuong_CaNhan.index', compact('khenThuong_CaNhans', 'data', 'caNhans'));
    }
}
