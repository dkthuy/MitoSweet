<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderCourses as MailOrderCourses;
use App\Models\OnlineCourses;
use App\Models\OrderCourses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    public function data()
    {
        $order = DB::table('order_courses')->orderBy('status', 'asc')->paginate(5);
        $course = DB::table('online_courses')->get();
        return view('admin.course_bill',['order' => $order, 'course' => $course]);
    }
    public function del($id){
        $order = OrderCourses::find($id);
        $order->delete();
        return redirect('order')->with('status', 'Xóa hóa đơn thành công!');
    }
    public function send($bill_id)
    {
        $order = OrderCourses::where('bill_id', $bill_id)->first();
        $arr   = array();
        foreach (explode(',',$order->course_id) as $item) {
            $course  = OnlineCourses::where('course_id', $item)->first();
            array_push($arr, $course->title);
        }
        $order->status = 1;
        $data = [
            'id'      => $order->bill_id,
            'name'    => $order->name,
            'title'   => $arr,
        ];
        $order->save();
        if ($order->save() == true) {
            $mail = $order->email;
            Mail::to($mail)->send(new MailOrderCourses($data));
            return redirect()->back()->with('status', 'Gửi mail thành công!');
        }else{
            return redirect()->back()->with('fail', 'Không gửi được!');
        }
    }
}
