<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponsController extends Controller
{
    public function data(){
        $coupons = DB::table('coupons')->paginate(5);
        return view('admin.discount',['discount' => $coupons]);
    }

    public function add(Request $request){
        // echo "<pre>";
        //     print_r($request->all());
        // echo "</pre>";

        // $this->validate($request,
        //     [
        //         'code'=>'bail|required|regex:/^[A-Z][A-Z][A-Z][0-9][0-9]$/',
        //         'discount'=>'required|between:10,80',
        //     ],
        //     [
        //         'code.required' => 'Mã giảm giá bắt buộc nhập',
        //         'discount.required' => 'Phần trăm giảm giá bắt buộc nhập',
        //         'code.regex' => 'Mã giảm giá sai định dạng',
        //         'discount.between' => 'Giảm giá từ 10% -> 80%'
        //     ]
        // ); bắt lỗi validation

        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $coupons           = new Coupons();
                $coupons->code     = $request->code;
                $coupons->discount = $request->discount;

                $coupons->save();
                DB::commit();
                return redirect()->back()->with('status', 'Thêm phiếu giảm giá thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                return redirect()->back()->with('fail', 'Không thêm được!');
            }
        }
        return view('admin.discount');
    }

    public function edit(Request $request, $id){
        $coupons = Coupons::find($id);
        if($request->isMethod('post')){
            $coupons->code     = $request->code;
            $coupons->discount = $request->discount;
            $coupons->save();
            return redirect()->back()->with('status', 'Sửa phiếu giảm giá thành công!');
        }
        return redirect()->back();
    }

    public function delete($id){
        $coupons = Coupons::find($id);
        $coupons->delete();
        return redirect()->back()->with('status', 'Xóa phiếu giảm giá thành công!');
    }

    public function deleteMul(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        foreach($ids as $id){
            Coupons::where('id', $id)->delete();
        }
        return response()->json(['status' => true,'message'=>"Xóa thành công!"]);
    }
}
