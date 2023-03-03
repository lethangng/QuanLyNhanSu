<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhenThuong;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\KhenThuongRequest;
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
        $khenThuongs = KhenThuong::paginate(5);
        $caNhans = NhanVien::select(DB::raw('id, HoTen'))->get();
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
        $caNhans = NhanVien::select(DB::raw('id, HoTen'))->get();
        return view('nhansu.khenThuong_CaNhan.create', compact('title', 'khenThuongs', 'caNhans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KhenThuongRequest $request)
    {
        KhenThuong::create([
            'KhenThuong_id' => $request->KhenThuong_id,
            'NhanVien_id' => $request->NhanVien_id,
            'NgayKhenThuong' => $request->NgayKhenThuong,
            'ChiTietKhenThuong' => $request->ChiTietKhenThuong
        ]);

        $hoTen = NhanVien::select('HoTen')->where('id', '=', $request->NhanVien_id)->first()->HoTen;
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
        $khenThuong_CaNhans = KhenThuong::find($id);
        $khenThuongs = KhenThuong::all();
        $caNhans = NhanVien::select(DB::raw('id, HoTen'))->get();
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
    public function update(KhenThuongRequest $request, $id)
    {
        // dd($request);
        KhenThuong::where('id', $id)
        ->update([
            'KhenThuong_id' => $request->KhenThuong_id,
            'NhanVien_id' => $request->NhanVien_id,
            'NgayKhenThuong' => $request->NgayKhenThuong,
            'ChiTietKhenThuong' => $request->ChiTietKhenThuong
        ]);
        $hoTen = NhanVien::select('HoTen')->where('id', '=', $request->NhanVien_id)->first()->HoTen;
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
        KhenThuong::where('id', $id)->delete();
        toastr()->success('Xóa khen thưởng của nhân viên '. $request->HoTen . ' thành công.', 'Xóa thành công');

        return redirect()->route('khenthuong_canhan.index');
    }

    public function search(Request $request) {
        $caNhans = NhanVien::select(DB::raw('id, HoTen'))->get();
        // dd($request);
        $data = [
            'Thang' => $request->Thang,
            'Nam' => $request->Nam,
            'HoTen' => $request->HoTen
        ];
        // dd($data['Thang']);
        // dd($data);

        // Lấy ra các NhanVien_id trong bảng khenthuong khi biết HoTen trong bảng NhanVien
        $NhanVien_ids = KhenThuong::select('NhanVien_id')
        ->join('NhanVien', 'KhenThuong.NhanVien_id', '=', 'NhanVien.id')
        ->where('NhanVien.HoTen', '=', $request->HoTen)->get();
        // dd($NhanVien_ids);

        // Tìm ra trong bảng khenthuong có id nào gióng với id của NhanVien_id bên trên
        $khenThuong_CaNhans = KhenThuong::select('*')
        ->whereMonth('NgayKhenThuong', $request->Thang)
        ->orwhereYear('NgayKhenThuong', $request->Nam)
        ->orwhereIn('NhanVien_id', $NhanVien_ids)->paginate(5);
        // dd($khenThuong_CaNhans);
        return view('nhansu.khenThuong_CaNhan.index', compact('khenThuong_CaNhans', 'data', 'caNhans'));
    }
}
