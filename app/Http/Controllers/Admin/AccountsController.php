<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AccountsController extends Controller
{
    public function data(){
        $account = DB::table('accounts')->paginate(5);
        $type    = DB::table('account_types')->get();
        return view('admin.accounts',['account' => $account, 'type' => $type]);
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $account              = new Accounts();

                $account->img         = $request->filepath;
                $account->name        = $request->name;
                $account->password    = bcrypt($request->password);
                $account->fullname    = $request->fullname;
                $account->email       = $request->email;
                $account->phone       = $request->phone;
                $account->status      = $request->status;
                $account->type        = $request->type;

                $account->save();
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
    public function edit(Request $request, $id){
        $account = Accounts::find($id);
        if($request->isMethod('post')){
                $account->img         = $request->filepath;
                $account->name        = $request->name;
                $account->password    = bcrypt($request->password);
                $account->fullname    = $request->fullname;
                $account->email       = $request->email;
                $account->phone       = $request->phone;
                $account->status      = $request->status;
                $account->type        = $request->type;
            $account->save();
            return redirect()->back()->with('status', 'Sửa người dùng thành công!');
        }
        return redirect()->back();
    }

    public function delete($id){
        $account = Accounts::find($id);
        $account->delete();
        return redirect()->back()->with('status', 'Xóa người dùng thành công!');
    }
}
