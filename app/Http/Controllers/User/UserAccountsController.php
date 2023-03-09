<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAccountsController extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                // $account              = new Accounts();

                // $account->img         = $request->filepath;
                // $account->name        = $request->name;
                // $account->password    = bcrypt($request->password);
                // $account->fullname    = $request->fullname;
                // $account->email       = $request->email;
                // $account->phone       = $request->phone;
                // $account->status      = $request->status;
                // $account->type        = $request->type;

                // $account->save();
                DB::commit();
                return redirect()->back()->with('status', 'Thêm người dùng thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                // return $exception->getMessage();
                return redirect()->back()->with('fail', 'Không thêm được!');
            }
        }
        return view('admin.accounts');
    }
}
