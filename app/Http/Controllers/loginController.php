<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    public function home()
    {
        return view('login');
    }

    public function submitLogin(Request $request)
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
            'password' => 'required|min:3|max:255',
        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], false)) {
                Auth::user()->findRoleId(Auth::user()->id);
                if (Auth::user()->roleId == 1) {
                    return response()->json(['error_check' => false, 'url' => "/admin"]);
                } else if (Auth::user()->roleId == 2) {
                    return response()->json(['error_check' => false, 'url' => "/nhanvien"]);
                } else if (Auth::user()->roleId == 3) {
                    return response()->json(['error_check' => false, 'url' => "/nhanvien"]);
                } else if (Auth::user()->roleId == 4) {
                    return response()->json(['error_check' => false, 'url' => "/nhansu"]);
                } else {
                    return response()->json(['error_check' => false, 'url' => ""]);
                }
            } else {
                if (User::where('email', $request->email)->first()) {
                    return response()->json(['error_check' => true, 'checkUser' => true, 'msg' => "Mật khẩu không chính xác"]);
                } else {
                    return response()->json(['error_check' => true, 'checkUser' => false, 'msg' => "Email không chính xác"]);
                }
            }
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function getLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return view('login');
    }
}
