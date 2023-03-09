<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountTypesController extends Controller
{
    public function data(){
        $type    = DB::table('account_types')->paginate(5);
        $role    = DB::table('account_roles')->get();
        return view('admin.accounttype',['type' => $type, 'role' => $role]);
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $type = new AccountTypes();
                $type->name   = $request->name;
                if ($request->role != '') {
                    $role          = implode(",", $request->role); // Thêm vào chuỗi
                } else {
                    $role          = $request->role;
                }
                $type->roles  = $role;

                $type->save();
                DB::commit();
                return redirect()->back()->with('status', 'Thêm loại tài khoản thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                // return $exception->getMessage();
                return redirect()->back()->with('fail', 'Không thêm được!');
            }
        }
        return view('admin.accounttype');
    }
    public function edit(Request $request, $id){
        $type = AccountTypes::find($id);
        if($request->isMethod('post')){
            $type->name  = $request->name;
            if ($request->role != '') {
                $role          = implode(",", $request->role); // Thêm vào chuỗi
            } else {
                $role          = $request->role;
            }
            $type->roles  = $role;

            $type->save();
            return redirect()->back()->with('status', 'Sửa loại tài khoản thành công!');
        }
        return redirect()->back();
    }

    public function delete($id){
        $type = AccountTypes::find($id);
        $type->delete();
        return redirect()->back()->with('status', 'Xóa loại tài khoản thành công!');
    }
}
