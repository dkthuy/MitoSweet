<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function edit(Request $request, $id){
        $account = Accounts::find($id);
        if($request->isMethod('post')){
                $account->img         = $request->filepath;
                $account->name        = $request->name;
                $account->fullname    = $request->fullname;
                $account->email       = $request->email;
                $account->phone       = $request->phone;
            $account->save();
            return redirect()->back()->with('status', 'Cập nhật thông tin thành công!');
        }
        return redirect()->back()->with('fail', 'Không thể cập nhật thông tin!');
    }
    public function changePass(Request $request, $id){
        $account = Accounts::find($id);
        if($request->isMethod('post')){
            if ($request->password == $request->checkpass) {
                $account->password    = bcrypt($request->password);
                $account->save();
                return redirect()->back()->with('status', 'Đổi mật khẩu thành công!');
            }else{
                return redirect()->back()->with('fail', 'Mật khẩu không trùng khớp!');
            }
        }
        return redirect()->back()->with('fail', 'Không thể đổi mật khẩu!');
    }
}
