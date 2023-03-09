<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderCakes as MailOrderCakes;
use App\Models\CakeSizes;
use App\Models\CakeTypes;
use App\Models\OrderCakes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderCakesController extends Controller
{
    public function data()
    {
        $order = DB::table('order_cakes')->orderBy('status', 'asc')->paginate(5);
        $type = DB::table('cake_types')->get();
        $size = DB::table('cake_sizes')->get();
        return view('admin.order_bill',['order' => $order, 'size' => $size, 'type' => $type]);
    }
    public function del($id){
        $order = OrderCakes::find($id);
        $order->delete();
        return redirect('order')->with('status', 'Xóa hóa đơn thành công!');
    }
    public function send($bill_id)
    {
        $order = OrderCakes::where('bill_id', $bill_id)->first();
        $type  = CakeTypes::where('id', $order->type)->first();
        $size  = CakeSizes::where('id', $order->size)->first();
        $order->status = 1;
        $data = [
            'title'   => $order->title,
            'phone'   => $order->phone,
            'email'   => $order->email,
            'date'    => $order->date,
            'address' => $order->address,
            'type'    => $type->title,
            'size'    => $size->title,
            'subject' => $order->subject,
            'note'    => $order->note,
            'name'    => $order->name,
        ];
        // dd($order);
        $order->save();
        if ($order->save() == true) {
            $mail = $order->email;
            Mail::to($mail)->send(new MailOrderCakes($data));
            return redirect()->back()->with('status', 'Gửi mail thành công!');
        }else{
            return redirect()->back()->with('fail', 'Không gửi được!');
        }
    }
}
