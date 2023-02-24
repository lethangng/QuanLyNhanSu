<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class loginController extends Controller
{
    public function home()
    {
        return view('login.login');
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
                return  Auth::user()->controller(Auth::user()->roleId);
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
    public function fogotPassword(Request $request)
    {
        $messsages = array(
            'email.required' => 'Vui lòng nhập email đăng nhập',
            'email.email' => 'Vui lòng nhập email',
            'email.max' => 'Email quá dài vui lòng nhập lại',
        );
        $rules = array(
            'email' => 'required|email|max:255',
        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->passes()) {
            if ($user =  User::where('email', $request->email)->first()) {
                $user->updateToken(Str::random(10));
                FacadesMail::send(
                    'emails.login',
                    [
                        'user' => $user,
                        'url' => $request->url(),
                    ],
                    function ($email) use ($user) {
                        $email->subject("thông báo");
                        $email->to($user->email);
                    }
                );
                return response()->json(['error_check' => false, 'msg' => $user->password]);
            }
            return response()->json(['error_check' => true, 'checkUser' => false, 'msg' => "Email không chính xác"]);
        } else {
            return response()->json(['error' => $validator->errors()]);
        }
    }
    public function formFogotPassword(Request $request, $id, $token)
    {
        $user =  User::find($id);
        if ($user->token == $token) {
            return view('login.forgotPassword', ['id' => $id, 'token' => $token]);
        }
        // $user->updateToken('');
        abort(404);
    }

    public function postFormFogotPassword(Request $request, $id, $token)
    {
        $messsages = array(
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu quá ngắn vui lòng nhập lại',
            'password.max' => 'Mật khẩu quá dài vui lòng nhập lại',
            'password_p.required' => 'Vui lòng nhập mật khẩu',
            'password_p.min' => 'Mật khẩu quá ngắn vui lòng nhập lại',
            'password_p.max' => 'Mật khẩu quá dài vui lòng nhập lại',
        );
        $rules = array(
            'password' => 'required|min:3|max:255',
            'password_p' => 'required|min:3|max:255',
        );
        $validator = Validator::make($request->all(), $rules, $messsages);
        if ($validator->passes()) {
            if ($request->password == $request->password_p) {
                $user =  User::find($id);
                $user->updatePass($request->password);
                if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
                    Auth::user()->findRoleId(Auth::user()->id);
                    return  Auth::user()->controller(Auth::user()->roleId);
                } else {
                    return response()->json(['error_check' => true,  'msg' => 'Bạn nhập sai! Vui lòng nhập lại']);
                }
            } else {
                return response()->json(['error' => $validator->errors()]);
            }
        }
    }
}
