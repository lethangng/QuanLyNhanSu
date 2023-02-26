<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhenThuong_ThongTinCaNhan;
use App\Models\KhenThuong;
use App\Models\ThongTinCaNhan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LuongRequest;
use App\Models\Luong;
class LuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Danh sách lương của nhân viên';
        $luongs = Luong::paginate(5);
        $caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
        return view('taichinh.luong.index', compact('luongs', 'title', 'caNhans')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm mới lương của nhân viên';
        // $khenThuongs = KhenThuong::all();
        $caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
        return view('taichinh.luong.create', compact('title', 'caNhans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LuongRequest $request)
    {
        Luong::create([
            'ThongTinCaNhan_id' => $request->ThongTinCaNhan_id,
            'HSL' => $request->HSL,
            'Thang' => $request->Thang,
            'Nam' => $request->Nam
        ]);

        $hoTen = ThongTinCaNhan::select('HoTen')->where('id', '=', $request->ThongTinCaNhan_id)->first()->HoTen;
        toastr()->success('Thêm lương cho nhân viên '. $hoTen .' thành công.', 'Thêm thành công');
        return redirect()->route('luong.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Cập nhập lương của nhân viên';
        $luong = Luong::find($id);
        $caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
        // dd($khenthuong);
        return view('taichinh.luong.edit', compact('luong', 'title', 'caNhans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LuongRequest $request, $id)
    {
        // dd($request);
        Luong::where('id', $id)
        ->update([
            'ThongTinCaNhan_id' => $request->ThongTinCaNhan_id,
            'HSL' => $request->HSL,
            'Thang' => $request->Thang,
            'Nam' => $request->Nam
        ]);
        $hoTen = ThongTinCaNhan::select('HoTen')->where('id', '=', $request->ThongTinCaNhan_id)->first()->HoTen;
        // dd($hoTen);
        toastr()->success('Sửa lương của nhân viên '. $hoTen .' thành công.', 'Sửa thành công');
        return redirect()->route('luong.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Luong::where('id', $id)->delete();
        toastr()->success('Xóa lương của nhân viên '. $request->HoTen . ' thành công.', 'Xóa thành công');

        return redirect()->route('luong.index');
    }

    public function search(Request $request) {
        $caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
        // dd($request);
        $data = [
            'HoTen' => $request->HoTen
        ];
        // dd($data['Thang']);
        // dd($data);

        // Lấy ra các ThongTinCaNhan_id trong bảng khenthuong_thongtincanhan khi biết HoTen trong bảng thongtincanhan
        $thongTinCaNhan_ids = Luong::select('ThongTinCaNhan_id')
        ->join('thongtincanhan', 'luong.ThongTinCaNhan_id', '=', 'thongtincanhan.id')
        ->where('thongtincanhan.HoTen', '=', $request->HoTen)->get();
        // dd($thongTinCaNhan_ids);

        // Tìm ra trong bảng khenthuong_thongtincanhan có id nào gióng với id của thongtincanhan_id bên trên
        $luongs = Luong::select('*')
        ->whereIn('ThongTinCaNhan_id', $thongTinCaNhan_ids)->paginate(5);
        // dd($luongs);
        return view('taichinh.luong.index', compact('luongs', 'data', 'caNhans'));
    }

    public function indexLuong() {
        $title = 'Danh sách lương của nhân viên';
        $luongs = Luong::paginate(5);
        $caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
        return view('taichinh.dsLuong.index', compact('luongs', 'title', 'caNhans')); 
    }
    public function chiTietLuong($id) {
        $caNhan = ThongTinCaNhan::select(DB::raw('*'))->where('id', '=', $id)->first();
        return view('nhanvien.chiTietLuong', compact('caNhan'));
    }

    public function searchChiTiet(Request $request) {
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
        $thongTinCaNhan_ids = Luong::select('ThongTinCaNhan_id')
        ->join('thongtincanhan', 'luong.ThongTinCaNhan_id', '=', 'thongtincanhan.id')
        ->where('thongtincanhan.HoTen', '=', $request->HoTen)->get();
        // dd($thongTinCaNhan_ids);

        // Tìm ra trong bảng khenthuong_thongtincanhan có id nào gióng với id của thongtincanhan_id bên trên
        $luongs = Luong::select('*')
        ->orwhere('Thang', $request->Thang)
        ->orwhere('Nam', $request->Nam)
        ->orwhereIn('ThongTinCaNhan_id', $thongTinCaNhan_ids)->paginate(5);
        // dd($luongs);
        return view('taichinh.dsLuong.index', compact('luongs', 'data', 'caNhans'));
    }
}
