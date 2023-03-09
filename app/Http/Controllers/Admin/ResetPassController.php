<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ResetPass;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ResetPassController extends Controller
{
    public function resetpass(Request $request)
    {
        $account = Accounts::where('email', $request->email)->first();
        if ($account != null) {
            $pass = rand(100000, 999999);
            $account->password = bcrypt((string)$pass);
            $account->save();
            $data = [
                'email'  => $request->email,
                'pass'   => $pass,
                'name'   => $account->name,
            ];
            if ($account->save() == true) {
                $mail = $request->email;
                Mail::to($mail)->send(new ResetPass($data));
                return redirect('login')->with('success', 'Vui lòng kiểm tra email!');
            }else{
                return redirect('login')->with('status', 'Không gửi được email này!');
            }
        } else {
            return redirect('login')->with('status', 'Không tồn tại email này!');
        }
    }
}
