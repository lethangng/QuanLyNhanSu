<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KyLuat;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\KyLuatRequest;
// use Yoeunes\Toastr\Toastr;
class KyLuatController extends Controller
{
    protected $kyluat;
    protected $nhanvien;
    public function __construct(){
        $this->kyluat = new KyLuat;
        $this->nhanvien = new NhanVien;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Danh sách kỷ luật';
        $kyluats = KyLuat::paginate(5);
        return view('kyluat.index', compact('kyluats', 'title')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm mới kỷ luật của nhân viên';
        $kyLuats = KyLuat::all();
        return view('nhansu.kyLuat_CaNhan.create', compact('title', 'kyLuats', 'caNhans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KyLuatRequest $request)
    {
        KyLuat::create([
            'KyLuat_id' => $request->KyLuat_id,
            'ThongTinCaNhan_id' => $request->ThongTinCaNhan_id,
            'NgayKyLuat' => $request->NgayKyLuat,
            'ChiTietKyLuat' => $request->ChiTietKyLuat
        ]);
        toastr()->success('Thêm kỷ luật cho nhân viên '.' thành công.', 'Thêm thành công');
        return redirect()->route('kyluat_canhan.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Cập nhập kỷ luật của nhân viên';
        $kyLuat_CaNhans = KyLuat::find($id);
        $kyLuats = KyLuat::all();
        // dd($KyLuat);
        return view('nhansu.kyLuat_CaNhan.edit', compact('kyLuat_CaNhans', 'title', 'kyLuats', 'caNhans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KyLuatRequest $request, $id)
    {
        // dd($request);
        KyLuat::where('id', $id)
        ->update([
            'KyLuat_id' => $request->KyLuat_id,
            'ThongTinCaNhan_id' => $request->ThongTinCaNhan_id,
            'NgayKyLuat' => $request->NgayKyLuat,
            'ChiTietKyLuat' => $request->ChiTietKyLuat
        ]);
        toastr()->success('Sửa kỷ luật của nhân viên ' .' thành công.', 'Sửa thành công');
        return redirect()->route('kyluat_canhan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        KyLuat::where('id', $id)->delete();
        toastr()->success('Xóa kỷ luật của nhân viên '. $request->HoTen . ' thành công.', 'Xóa thành công');

        return redirect()->route('kyluat_canhan.index');
    }

    public function search(Request $request) {
        // dd($request);
        $data = [
            'Thang' => $request->Thang,
            'Nam' => $request->Nam,
            'HoTen' => $request->HoTen
        ];
        // dd($data['Thang']);
        // dd($data);

        // Lấy ra các ThongTinCaNhan_id trong bảng KyLuat khi biết HoTen trong bảng thongtincanhan
        $thongTinCaNhan_ids = KyLuat::select('ThongTinCaNhan_id')
        ->join('thongtincanhan', 'KyLuat.ThongTinCaNhan_id', '=', 'thongtincanhan.id')
        ->where('thongtincanhan.HoTen', '=', $request->HoTen)->get();
        // dd($thongTinCaNhan_ids);

        // Tìm ra trong bảng KyLuat có id nào gióng với id của thongtincanhan_id bên trên
        $kyLuat_CaNhans = KyLuat::select('*')
        ->whereMonth('NgayKyLuat', $request->Thang)
        ->orwhereYear('NgayKyLuat', $request->Nam)
        ->orwhereIn('ThongTinCaNhan_id', $thongTinCaNhan_ids)->paginate(5);
        // dd($kyLuat_CaNhans);
        return view('nhansu.kyLuat_CaNhan.index', compact('kyLuat_CaNhans', 'data', 'caNhans'));
    }
}
