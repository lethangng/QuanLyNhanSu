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


class TaiKhoanController extends Controller
{
    protected $user;
    protected $nhanvien;
    public function __construct()
    {
        $this->user = new User();
        $this->nhanvien = new NhanVien();
    }
    public function index()
    {
        $listData = User::all();
        return view('taikhoan.danhsachtaikhoan', compact('listData'));
    }
    public function formAdd()
    {
        return view('taikhoan.themmoitaikhoan');
    }
    public function formUpdate(Request $req)
    {
        $data = User::find($_GET['id']);
        return view('taikhoan.suataikhoan', compact('data'));
    }

    public function Update(Request $request)
    {
        $messsages = array(
            'email.required' => 'Vui lòng nhập email đăng nhập',
            'email.email' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu quá ngắn vui lòng nhập lại',
            'password.max' => 'Mật khẩu quá dài vui lòng nhập lại',
            'email.max' => 'Email quá dài vui lòng nhập lại',
        );
        $rules = array(
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:255',
        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->passes()) {
            $user = User::find($request->id);
            $user->updateUser($request->email, $this->delAllSpace($request->password));
            return response()->json(['error_check' => true,  'url' => route('danhsachtaikhoan')]);
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function Add(Request $request)
    {
        $messsages = array(
            'manv.required' => 'Vui lòng nhập email đăng nhập',
            'email.required' => 'Vui lòng nhập email đăng nhập',
            'email.email' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu quá ngắn vui lòng nhập lại',
            'password.max' => 'Mật khẩu quá dài vui lòng nhập lại',
            'email.max' => 'Email quá dài vui lòng nhập lại',
        );
        $rules = array(
            'manv' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'required|min:3|max:255',

        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->passes()) {
            if (User::where('email', $request->email)->first()) {
                return response()->json(['errCheck' => false, 'msg' => 'Email đã tồn tại']);
            } else {
                $user = new User();
                $user->insertUser($request->manv, $request->email, $this->delAllSpace($request->password));
                return response()->json(['errCheck' => true, 'url' => route('danhsachtaikhoan')]);
            }
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function del(Request $request)
    {
        $data = User::find($request->data);
        $data->delete();
        return $this->searchAll();
    }
    public function search(Request $request)
    {
        if ($request->data == '') {
            return $this->searchAll();
        }
        if ($user = User::where('id', $this->delAllSpace($request->data))->first()) {
            $strQr = $user->searchElm();
            return response()->json(['msg' => $strQr]);
        }
        return response()->json(['msg' => '']);
    }
    public function searchAll()
    {
        $listdata = User::all();
        $strQr = '';
        $count = 0;
        foreach ($listdata as $user) {
            $count++;
            $strQr .= $user->searchElm();
            if ($count == 5)
                return response()->json(['msg' => $strQr]);
        }
        return response()->json(['msg' => $strQr]);
    }
    public function findNameNv(Request $request)
    {

        if ($nv = NhanVien::find($this->delAllSpace($request->data))) {
            if (User::where('manv', $this->delAllSpace($request->data))->first()) {
                return response()->json(['check' => true, 'msg' => 'Nhân viên đã có tài khoản']);
            } else {
                if ($nv->checkMachucvu()) {
                    return response()->json(['check' => false, 'msg' => $nv->tennv]);
                }
                return response()->json(['check' => true, 'msg' => 'Nhân viên không thuộc phòng nhân sự']);
            }
        } else {
            return response()->json(['check' => true, 'msg' => 'Mã nhân viên không tồn tại']);
        }
    }

    public function delAllSpace($string)
    {
        $pattern = '/\s{1,}/';
        $newString = preg_replace($pattern, '', $string);
        return trim($newString);
    }
}
