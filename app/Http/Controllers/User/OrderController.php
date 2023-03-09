<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderCakes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function data($id){
        $cake  = DB::table('cakes')->where('id', $id)->get();
        $type  = DB::table('cake_types')->get();
        $size  = DB::table('cake_sizes')->get();
        return view('user.formorder', ['cake' => $cake, 'type' => $type, 'size' => $size]);
    }
    public function create(Request $request)
    {
        $cake = DB::table('cakes')->get();
        $size  = DB::table('cake_sizes')->get();
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $order = new OrderCakes();
                $order->bill_id = rand(10000000000,99999999999);

                $order->title   = $request->title;
                $order->phone   = $request->phone;
                $order->email   = $request->email;
                $order->date    = $request->date;
                $order->address = $request->address;
                $order->type    = $request->type;
                $order->size    = $request->size;
                foreach ($cake as $cakes) {
                    foreach ($size as $sizes) {
                        if ($order->size == $sizes->id) {
                            $price = ($cakes->price)*($sizes->heso);
                        }
                    }
                }
                $order->price   = $price;
                $order->subject = $request->subject;
                $order->note    = $request->note;
                $order->name    = $request->name;
                // dd($order);
                $order->save();
                DB::commit();
                return redirect()->back()->with('status', 'Đã gửi đơn đặt bánh chờ xác nhận!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                return $exception->getMessage();
                // return redirect()->back()->with('fail', 'Không gửi được!');
            }
        }
        return view('user.formorder');
    }
}
