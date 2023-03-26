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
        $this->kyluat = new KyLuat();
        $this->nhanvien = new NhanVien();
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
            return response()->json(['error' => ['upfile' => 'File bắt buộc phải nhập']]);
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
            KyLuat::where('id', $id)
                ->update([
                    'manv' => $request->manv,
                    'ngaykyluat' => $request->ngaykyluat,
                    'lydo' => $request->lydo
                ]);
            return response()->json(["check" => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KyLuat::where('id', $id)->delete();
        $kyluat = KyLuat::find($id);
        if($kyluat) {
            return response()->json(['msg' => '']);
        } else {
            return response()->json(["check" => true]);
        }
    }

    public function search(Request $request) {
        $data = [
            'thang' => $request->thang,
            'nam' => $request->nam,
            'manv' => $this->formatInput($request->manv)
        ];
        if($data['thang'] && $data['nam'] && $data['manv']) {
            $kyluats = KyLuat::select('*')
                ->whereMonth('ngaykyluat', $data['thang'])
                ->whereYear('ngaykyluat', $data['nam'])
                ->where('manv', $data['manv'])->paginate(5);
        } else if($data['thang'] && $data['manv']) {
            $kyluats = KyLuat::select('*')
            ->whereMonth('ngaykyluat', $data['thang'])
            ->where('manv', $data['manv'])->paginate(5);
        } else if($data['nam'] && $data['manv']) {
            $kyluats = KyLuat::select('*')
            ->whereYear('ngaykyluat', $data['nam'])
            ->where('manv', $data['manv'])->paginate(5);
        } else if($data['nam'] && $data['thang']) {
            $kyluats = KyLuat::select('*')
            ->whereMonth('ngaykyluat', $data['thang'])
            ->whereYear('ngaykyluat', $data['nam'])->paginate(5);
        } else if($data['thang']) {
            $kyluats = KyLuat::select('*')
                ->whereMonth('ngaykyluat', $data['thang'])->paginate(5);
        } else if($data['nam']) {
            $kyluats = KyLuat::select('*')
            ->whereYear('ngaykyluat', $data['nam'])->paginate(5);
        } else if($data['manv']) {
            $kyluats = KyLuat::select('*')
            ->where('manv', $data['manv'])->paginate(5);
        } else {
            return redirect()->route('kyluat.index');
        }
        return view('kyluat.index', compact('kyluats', 'data'));
    }
    public function findNameNvKyLuat(Request $request)
    {
        if(!$request->dataId) {
            return response()->json(['check' => true, 'msg' => 'Vui lòng nhập mã nhân viên']);
        } else {
            $manv = $this->formatInput($request->dataId);
            if(!is_numeric($manv)) {
                return response()->json(['check' => true, 'msg' => 'Mã nhân viên không tồn tại', 'manv' => $manv]);
            } else {
                $user = NhanVien::where('id', $manv)->first();
                if ($user) {
                    // Kiểm tra xem nhân viên nhập vào có ở trạng thái "thai sản" không
                    $nhanvien = DB::select("SELECT nhanvien.id FROM nhanvien JOIN trangthai ON nhanvien.matrangthai = trangthai.id
                    WHERE (trangthai.matrangthai = 'TS' OR trangthai.matrangthai = 'NV') AND nhanvien.id = ".$manv);
                    if($nhanvien) {
                        return response()->json(['check' => true,
                        "msg" => 'Nhân viên ở trạng thái thai sản hoặc nghỉ việc', 'manv' => $manv]);
                    }
                return response()->json(['check' => false, 'msg' => $user->tennv, 'manv' => $manv]);
                }
            }
        }
    }
    public function formatInput($input) {
        $output = str_replace(' ', '', $input);
        return trim($output);
    }
}
