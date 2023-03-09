<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CakeTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CakeTypesController extends Controller
{
    public function data(){
        $type = DB::table('cake_types')->paginate(5);
        return view('admin.caketypes',['type' => $type]);
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $types = new CakeTypes();
                $types->title   = $request->title;
                $types->save();
                DB::commit();
                return redirect()->back()->with('status', 'Thêm loại bánh thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                return redirect()->back()->with('fail', 'Đã tồn tại loại này!');
            }
        }
        return view('admin.caketypes');
    }

    public function edit(Request $request, $id){
        $types = CakeTypes::find($id);
        if($request->isMethod('post')){
            $types->title   = $request->title;
            $types->save();
            return redirect()->back()->with('status', 'Sửa loại bánh thành công!');
        }
        return redirect()->back();
    }

    public function delete($id){
        $types = CakeTypes::find($id);
        $types->delete();
        return redirect()->back()->with('status', 'Xóa loại bánh thành công!');
    }

    public function deleteMul(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        foreach($ids as $id){
            CakeTypes::where('id', $id)->delete();
        }
        return response()->json(['status' => true,'message'=>"Xóa thành công!"]);
    }

    // public function select()
    // {
    //     $type = CakeTypes::all();
    //     $item = $type->count();
    //     $db = [];
    //     $db = $type;
    //     for ($i = 0; $i < $item; $i++){
    //         $db[$i] = '<option>'.$db[$i]->title.'</option>';
    //     }
    //     return $db;
    // }
}
