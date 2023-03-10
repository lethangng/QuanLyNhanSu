<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KyLuat;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\KyLuatRequest;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::user()) {
            $title = 'Danh sách kỷ luật';
            $kyluats = KyLuat::paginate(5);
            return view('kyluat.index', compact('kyluats', 'title')); 
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Thêm mới kỷ luật';
        if (Auth::user()) {
            return view('kyluat.create', compact('title'));
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KyLuatRequest $request)
    {
        if ($request->file('upfile')) {
            $file = $request->file('upfile');
            $ext = $request->file('upfile')->extension();
            $file_name = time() . '-' . $request->manv . '.' . $ext;
            $publicPath = public_path('uploads/files');
            $file->move($publicPath, $file_name);
            KyLuat::create([
                'manv' => $request->manv,
                'ngaykyluat' => $request->ngaykyluat,
                'lydo' => $request->lydo,
                'chitietkyluat' => $file_name
            ]);
            return response()->json(["check" => true]);
        } else {
            return redirect()->route('kyluat.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Cập nhập kỷ luật';
        if (Auth::user()) {
            $kyluat = KyLuat::find($id);
            return view('kyluat.edit', compact('kyluat', 'title'));
        } else {
            return redirect()->route('login');
        }
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
        if ($request->file('upfile')) {
            $file = $request->file('upfile');
            $ext = $request->file('upfile')->extension();
            $file_name = time() . '-' . $request->manv . '.' . $ext;
            $publicPath = public_path('uploads/files');
            $file->move($publicPath, $file_name);

            $oldFile = KyLuat::select('chitietkyluat')->where('id', $id)->get()[0]->chitietkyluat;
            // dd($oldFile);
            KyLuat::where('id', $id)
                ->update([
                    'manv' => $request->manv,
                    'ngaykyluat' => $request->ngaykyluat,
                    'lydo' => $request->lydo,
                    'chitietkyluat' => $file_name
                ]);
            // Xoa file cu
            unlink(public_path('uploads/files/'.$oldFile));
            return response()->json(["check" => true]);
        } else {
            return redirect()->route('kyluat.index');
        }
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
        return redirect()->route('kyluat.index');
    }

    public function search(Request $request) {
        $data = [
            'thang' => $request->thang,
            'nam' => $request->nam,
            'manv' => $request->manv
        ];
        if($data['thang'] && $data['nam'] && $data['manv']) {
            $kyluats = KyLuat::select('*')
                ->whereMonth('ngaykyluat', $request->thang)
                ->whereYear('ngaykyluat', $request->nam)
                ->where('manv', $request->manv)->paginate(5);
        } else if($data['thang'] && $data['manv']) {
            $kyluats = KyLuat::select('*')
            ->whereMonth('ngaykyluat', $request->thang)
            ->where('manv', $request->manv)->paginate(5);
        } else if($data['nam'] && $data['manv']) {
            $kyluats = KyLuat::select('*')
            ->whereYear('ngaykyluat', $request->nam)
            ->where('manv', $request->manv)->paginate(5);
        } else if($data['nam'] && $data['thang']) {
            $kyluats = KyLuat::select('*')
            ->whereMonth('ngaykyluat', $request->thang)
            ->whereYear('ngaykyluat', $request->nam)->paginate(5);
        } else if($data['thang']) {
            $kyluats = KyLuat::select('*')
                ->whereMonth('ngaykyluat', $request->thang)->paginate(5);
        } else if($data['nam']) {
            $kyluats = KyLuat::select('*')
            ->whereYear('ngaykyluat', $request->nam)->paginate(5);
        } else if($data['manv']) {
            $kyluats = KyLuat::select('*')
            ->where('manv', $request->manv)->paginate(5);
        } else {
            return redirect()->route('kyluat.index');
        }
        return view('kyluat.index', compact('kyluats', 'data'));
    }
    public function findNameNvKyLuat(Request $request)
    {
        if ($user = NhanVien::where('id', $request->dataId)->first()) {
            $nhanvien = DB::select('SELECT id FROM nhanvien WHERE matrangthai = 2');
            foreach($nhanvien as $nv) {
                if($request->dataId == $nv->id) {
                    return response()->json(['check' => true, "msg" => 'Nhân viên ở trạng thái mang thai không được thêm kỷ luật']);
                }
            }
            return response()->json(['check' => false, 'msg' => $user->tennv]);
        }
        return response()->json(['check' => true, 'msg' => 'Mã nhân viên không tồn tại']);
    }
}
