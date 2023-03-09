<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function checklogin(Request $request)
    {
        $arr = [
            'name' =>$request->name,
            'password' => $request->password
        ];
        if(Auth::attempt($arr)){
            return redirect('/')->with('status','Chào mừng đến với giao giao diện admin');
        }else{
            // return redirect('/login')->getMessage();
            return redirect('/login')->with('status','Tên tài khoản hoặc mật khẩu sai');
        }
    }
    public function forgot()
    {
        return view('admin.forgotpass');
    }
    public function checklogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
