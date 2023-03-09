<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CakeSizes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CakeSizesController extends Controller
{
    public function data(){
        $size = DB::table('cake_sizes')->paginate(5);
        return view('admin.cakesizes',['size' => $size]);
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $sizes = new CakeSizes();
                $sizes->title   = $request->title;
                $sizes->heso    = $request->heso;
                $sizes->save();
                DB::commit();
                return redirect()->back()->with('status', 'Thêm kích thước thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                return redirect()->back()->with('fail', 'Đã tồn tại hình dạng này!');
            }
        }
        return view('admin.cakesizes');
    }

    public function edit(Request $request, $id){
        $sizes = CakeSizes::find($id);
        if($request->isMethod('post')){
            $sizes->title   = $request->title;
            $sizes->heso    = $request->heso;
            $sizes->save();
            return redirect()->back()->with('status', 'Sửa kích thước thành công!');
        }
        return redirect()->back();
    }

    public function delete($id){
        $sizes = CakeSizes::find($id);
        $sizes->delete();
        return redirect()->back()->with('status', 'Xóa kích thước thành công!');
    }

    public function deleteMul(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        foreach($ids as $id){
            CakeSizes::where('id', $id)->delete();
        }
        return response()->json(['status' => true,'message'=>"Xóa thành công!"]);
    }
}
