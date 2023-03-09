<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseLevels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseLevelsController extends Controller
{
    public function data(){
        $level = DB::table('course_levels')->paginate(5);
        return view('admin.courselevels',['level' => $level]);
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $levels = new CourseLevels();
                $levels->title   = $request->title;
                $levels->save();
                DB::commit();
                return redirect()->back()->with('status', 'Thêm cấp độ thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                return redirect()->back()->with('fail', 'Không thêm được!');
            }
        }
        return view('admin.courselevels');
    }
    public function edit(Request $request, $id){
        $levels = CourseLevels::find($id);
        if($request->isMethod('post')){
            $levels->title   = $request->title;
            $levels->save();
            return redirect()->back()->with('status', 'Sửa cấp độ thành công!');
        }
        return redirect()->back();
    }

    public function delete($id){
        $levels = CourseLevels::find($id);
        $levels->delete();
        return redirect()->back()->with('status', 'Xóa cấp độ thành công!');
    }

    public function deleteMul(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        foreach($ids as $id){
            CourseLevels::where('id', $id)->delete();
        }
        return response()->json(['status' => true,'message'=>"Xóa thành công!"]);
    }

    // public function search(Request $request){
    //     $levels = CourseLevels::where('title', 'like', '%' . $request->search . '%')
    //                 ->paginate(5);
    //     return view('admin.courselevels',['level' => $levels]);
    // }

    // public function select()
    // {
    //     $level = CourseLevels::all();
    //     $item = $level->count();
    //     $db = [];
    //     $db = $level;
    //     for ($i = 0; $i < $item; $i++){
    //         $db[$i] = '<option>'.$db[$i]->title.'</option>';
    //     }
    //     return $db;
    // }
}
