<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\PublicRequest;
use App\Models\TrangThai;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TrangThaiController extends Controller
{
    public function index()
    {
        $listData = DB::table('trangthai')->paginate(5);
        return view('trangthai.danhsachtrangthai', compact('listData'));
    }
    public function formAdd()
    {
        return view('trangthai.themmoitrangthai');
    }
    public function formUpdate(Request $req)
    {
        $data = TrangThai::find($_GET['id']);
        return view('trangthai.suatrangthai', compact('data'));
    }

    public function Update(Request $request)
    {
        $messsages = array(
            'matrangthai.required' => 'Vui lòng nhập mã trạng thái',
            'tentrangthai.required' => 'Vui lòng nhập tên trạng thái',
        );
        $rules = array(
            'matrangthai' => 'required|max:255',
            'tentrangthai' => 'required|max:255',
        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->passes()) {
            $data = TrangThai::find($request->id);
            $data->addOrUpdate($request->matrangthai, $request->tentrangthai);
            return response()->json(['errCheck' => true, 'url' => route('danhsachtrangthai')]);
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function Add(Request $request)
    {
        $messsages = array(
            'matrangthai.required' => 'Vui lòng nhập mã trạng thái',
            'tentrangthai.required' => 'Vui lòng nhập tên trạng thái',
        );
        $rules = array(
            'matrangthai' => 'required|max:255',
            'tentrangthai' => 'required|max:255',
        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->passes()) {
            $trangthai = new TrangThai;
            $trangthai->addOrUpdate($request->matrangthai, $request->tentrangthai);
            return response()->json(['errCheck' => true, 'url' => route('danhsachtrangthai')]);
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function del(Request $request)
    {
        $data = TrangThai::find($request->data);
        $data->delete();
        return $this->searchAll();
    }
    public function search(Request $request)
    {
        if ($trangthai = TrangThai::where('matrangthai', $request->data)->first()) {
            $strQr = $trangthai->searchElm();
            return response()->json(['check' => true, 'msg' => $strQr]);
        }
        return response()->json(['check' => false, 'msg' => '']);
    }
    public function searchAll()
    {
        $listdata = TrangThai::all();
        $strQr = '';
        $count = 0;
        foreach ($listdata as $trangthai) {
            $count++;
            $strQr .= $trangthai->searchElm();
            if ($count == 5)
                return response()->json(['check' => true, 'msg' => $strQr]);
        }
    }
}
