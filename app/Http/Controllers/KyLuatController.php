<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KyLuat_ThongTinCaNhan;
use App\Models\KyLuat;
use App\Models\ThongTinCaNhan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\KyLuat_CaNhanRequest;
// use Yoeunes\Toastr\Toastr;
class KyLuat_CaNhanController extends Controller
{
    // protected $caNhans;
    // protected $kyLuats;
    // public function __construct() {
    //     $this->caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
    //     $this->kyLuats = KyLuat::all();
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Danh sách kỷ luật của nhân viên';
        $kyLuat_CaNhans = KyLuat_ThongTinCaNhan::paginate(5);
        $caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
        return view('nhansu.kyLuat_CaNhan.index', compact('kyLuat_CaNhans', 'title', 'caNhans')); 
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
        $caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
        return view('nhansu.kyLuat_CaNhan.create', compact('title', 'kyLuats', 'caNhans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KyLuat_CaNhanRequest $request)
    {
        KyLuat_ThongTinCaNhan::create([
            'KyLuat_id' => $request->KyLuat_id,
            'ThongTinCaNhan_id' => $request->ThongTinCaNhan_id,
            'NgayKyLuat' => $request->NgayKyLuat,
            'ChiTietKyLuat' => $request->ChiTietKyLuat
        ]);

        $hoTen = ThongTinCaNhan::select('HoTen')->where('id', '=', $request->ThongTinCaNhan_id)->first()->HoTen;
        toastr()->success('Thêm kỷ luật cho nhân viên '. $hoTen .' thành công.', 'Thêm thành công');
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
        $kyLuat_CaNhans = KyLuat_ThongTinCaNhan::find($id);
        $kyLuats = KyLuat::all();
        $caNhans = ThongTinCaNhan::select(DB::raw('id, HoTen'))->get();
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
    public function update(KyLuat_CaNhanRequest $request, $id)
    {
        // dd($request);
        KyLuat_ThongTinCaNhan::where('id', $id)
        ->update([
            'KyLuat_id' => $request->KyLuat_id,
            'ThongTinCaNhan_id' => $request->ThongTinCaNhan_id,
            'NgayKyLuat' => $request->NgayKyLuat,
            'ChiTietKyLuat' => $request->ChiTietKyLuat
        ]);
        $hoTen = ThongTinCaNhan::select('HoTen')->where('id', '=', $request->ThongTinCaNhan_id)->first()->HoTen;
        // dd($hoTen);
        toastr()->success('Sửa kỷ luật của nhân viên '. $hoTen .' thành công.', 'Sửa thành công');
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
        KyLuat_ThongTinCaNhan::where('id', $id)->delete();
        toastr()->success('Xóa kỷ luật của nhân viên '. $request->HoTen . ' thành công.', 'Xóa thành công');

        return redirect()->route('kyluat_canhan.index');
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

        // Lấy ra các ThongTinCaNhan_id trong bảng kyLuat_thongtincanhan khi biết HoTen trong bảng thongtincanhan
        $thongTinCaNhan_ids = KyLuat_ThongTinCaNhan::select('ThongTinCaNhan_id')
        ->join('thongtincanhan', 'KyLuat_ThongTinCaNhan.ThongTinCaNhan_id', '=', 'thongtincanhan.id')
        ->where('thongtincanhan.HoTen', '=', $request->HoTen)->get();
        // dd($thongTinCaNhan_ids);

        // Tìm ra trong bảng kyLuat_thongtincanhan có id nào gióng với id của thongtincanhan_id bên trên
        $kyLuat_CaNhans = KyLuat_ThongTinCaNhan::select('*')
        ->whereMonth('NgayKyLuat', $request->Thang)
        ->orwhereYear('NgayKyLuat', $request->Nam)
        ->orwhereIn('ThongTinCaNhan_id', $thongTinCaNhan_ids)->paginate(5);
        // dd($kyLuat_CaNhans);
        return view('nhansu.kyLuat_CaNhan.index', compact('kyLuat_CaNhans', 'data', 'caNhans'));
    }
}
