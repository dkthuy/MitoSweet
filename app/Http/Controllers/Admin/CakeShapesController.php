<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CakeShapes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CakeShapesController extends Controller
{
    public function data(){
        $shape = DB::table('cake_shapes')->paginate(5);
        return view('admin.cakeshapes',['shape' => $shape]);
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $shapes = new CakeShapes();
                $shapes->title   = $request->title;
                $shapes->save();
                DB::commit();
                return redirect()->back()->with('status', 'Thêm hình dạng bánh thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                return redirect()->back()->with('fail', 'Đã tồn tại hình dạng này!');
            }
        }
        return view('admin.cakeshapes');
    }

    public function edit(Request $request, $id){
        $shapes = CakeShapes::find($id);
        if($request->isMethod('post')){
            $shapes->title   = $request->title;
            $shapes->save();
            return redirect()->back()->with('status', 'Sửa hình dạng bánh thành công!');
        }
        return redirect()->back();
    }

    public function delete($id){
        $shapes = CakeShapes::find($id);
        $shapes->delete();
        return redirect()->back()->with('status', 'Xóa hình dạng bánh thành công!');
    }

    public function deleteMul(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        foreach($ids as $id){
            CakeShapes::where('id', $id)->delete();
        }
        return response()->json(['status' => true,'message'=>"Xóa thành công!"]);
    }
}
