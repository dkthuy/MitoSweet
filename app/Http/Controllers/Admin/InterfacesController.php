<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Interfaces;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterfacesController extends Controller
{
    public function data(){
        $page      = DB::table('pages')->get();
        $interface = DB::table('interfaces')->get();
        return view('admin.pages', ['page' => $page, 'interface' => $interface]);
    }

    public function edit(Request $request, $id){
        $page = Interfaces::where('pages_id', $id)->get();
        if($request->isMethod('post')){
            foreach ($page as $value) {
                if (strlen(strstr($value->item_id, 'slider')) > 0 || strlen(strstr($value->item_id, 'banner')) > 0 || strlen(strstr($value->item_id, 'img')) > 0) {
                    $db  = [];
                    $db  = explode(',', $request->input($value->item_id)); // file là chuỗi -> mảng
                    // bỏ local ở từng tp của mảng
                    for ($i=0; $i < count($db); $i++) {
                        $db[$i] = str_replace('http://localhost','', $db[$i]);

                    }
                    $img = implode(',', $db); // lưu về dạng mảng
                    $value->item_value = $img;
                }else {
                    $value->item_value = $request->input($value->item_id);
                }
                $value->save();
            }
            return redirect()->back()->with('status', 'Cập nhật giao diện thành công!');
        }
        return redirect()->back();
    }
}
