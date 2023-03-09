<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderCourses;
use Darryldecode\Cart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItem = Cart::getContent();
        return view('user.checkout', ['cart' => $cartItem]);
    }

    public function create(Request $request)
    {
        $cartItem = Cart::getContent();
        $coupon = Cart::getConditions();
        $name = '';
        foreach ($coupon as $value) {
            $coupon = $value->getValue();
            $name = $value->getName();
        }
        // dd($coupon);
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $order = new OrderCourses();
                $order->bill_id = rand(10000000000,99999999999);

                $order->phone   = $request->phone;
                $order->email   = $request->email;
                $order->note    = $request->note;
                $order->name    = $request->name;
                $arr = [];
                foreach ($cartItem as $item) {
                    array_push($arr, $item->id);
                }
                $order->course_id = implode(',', $arr);
                if ($coupon == '[]') {
                    $order->discount  = 0;
                } else {
                    $order->discount  = $coupon;
                }
                $order->total = Cart::getTotal();

                $order->save();

                foreach ($cartItem as $item) {
                    Cart::remove($item->id);
                }
                if ($name != '') {
                    Cart::removeCartCondition($name);
                }
                DB::commit();
                return redirect()->back()->with('status', 'Đơn hàng của bạn đã được đặt thành công! Vui lòng kiểm tra mail!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                return redirect()->back()->with('fail', 'Không thành công!');
            }
        }
    }
}
