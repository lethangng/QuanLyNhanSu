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
            $data->addOrUpdate($this->delAllSpace($request->matrangthai), $this->delSpaceInString($request->tentrangthai));
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
            if (TrangThai::where('matrangthai', '=', $this->delAllSpace($request->matrangthai))->first()) {
                return response()->json(['errCheck' => false, 'msg' => 'mã trạng thái đã tồn tại']);
            } else {
                $trangthai = new TrangThai;
                $trangthai->addOrUpdate($this->delAllSpace($request->matrangthai), $this->delSpaceInString($request->tentrangthai));
                return response()->json(['errCheck' => true, 'url' => route('danhsachtrangthai')]);
            }
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function del(Request $request)
    {
        $data = TrangThai::find($request->data);
        $data->delete();
        return response()->json(['msg' => $this->StrElement()]);
    }
    public function search(Request $request)
    {
        if ($request->data == '') {

            return response()->json(['msg' => $this->StrElement()]);
        }
        $str = $this->delSpaceInString($request->data);
        if ($trangthai = TrangThai::where('tentrangthai', 'like', '%' . $str . '%')->first()) {
            $strQr = $trangthai->searchElm();
            return response()->json(['check' => true, 'msg' => $strQr, 'str' => $str]);
        }
        return response()->json(['check' => false, 'msg' => '', 'str' => $str]);
    }
    public function delSpaceInString($string)
    {
        $pattern = '/\s{2,}/';
        $newString = preg_replace($pattern, ' ', $string);
        return trim($newString);
    }
    public function delAllSpace($string)
    {
        $pattern = '/\s{1,}/';
        $newString = preg_replace($pattern, '', $string);
        return trim($newString);
    }
    public function StrElement()
    {
        $dataTrangThai = TrangThai::all();
        $strEle = '';
        foreach ($dataTrangThai as $data) {
            $strEle .= $data->searchElm();
        }
        return $strEle;
    }
}
