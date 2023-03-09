<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnlineCourses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnlineCoursesController extends Controller
{
    public function data(){
        $course = DB::table('online_courses')->orderByDesc('id')->paginate(5);
        $level  = DB::table('course_levels')->get();
        return view('admin.onlinecourses',['online' => $course, 'level' => $level]);
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $course              = new OnlineCourses();

                $db  = [];
                $db  = explode(',', $request->filepath); // file là chuỗi -> mảng
                // bỏ local ở từng tp của mảng
                for ($i=0; $i < count($db); $i++) {
                    $db[$i] = str_replace('http://localhost','', $db[$i]);
                }
                $img = implode(',', $db); // lưu về dạng mảng -> chuỗi

                $course->course_id   = rand(1000000000,9999999999);

                $course->img         = $img;
                $course->title       = $request->title;
                $course->summary     = $request->summary;
                $course->detail      = $request->detail;
                $course->level       = $request->level;
                $course->price       = $request->price;
                $course->promo_price = $request->promo;
                $course->lesson      = $request->lesson;
                $trailer             = $request->trailer;
                $trailer             = str_replace('https://www.youtube.com/embed/','', $trailer);
                $course->trailer     = $trailer;

                $course->video       = implode(',', $request->video);

                $course->save();
                DB::commit();
                return redirect()->back()->with('status', 'Thêm khóa học thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                return $exception->getMessage();
                // return redirect()->back()->with('fail', 'Không thêm được!');
            }
        }
        return view('admin.onlinecourses');
    }
    public function edit(Request $request, $id){
        $course = OnlineCourses::find($id);
        if($request->isMethod('post')){
            $db  = [];
            $db  = explode(',', $request->filepath); // file là chuỗi -> mảng
            // bỏ local ở từng tp của mảng
            for ($i=0; $i < count($db); $i++) {
                $db[$i] = str_replace('http://localhost','', $db[$i]);
            }
            $img = implode(',', $db); // lưu về dạng mảng -> chuỗi

            $course->img         = $img;
            $course->title       = $request->title;
            $course->summary     = $request->summary;
            $course->detail      = $request->detail;
            $course->level       = $request->level;
            $course->price       = $request->price;
            $course->promo_price = $request->promo;
            $course->lesson      = $request->lesson;
            $trailer             = $request->trailer;
            $trailer             = str_replace('https://www.youtube.com/embed/','', $trailer);
            $course->trailer     = $trailer;

            $course->video       = implode(',', $request->video);

            $course->save();
            return redirect()->back()->with('status', 'Sửa khóa học thành công!');
        }
        return redirect()->back();
    }

    public function delete($id){
        $course = OnlineCourses::find($id);
        $course->delete();
        return redirect()->back()->with('status', 'Xóa khóa học thành công!');
    }

    public function deleteMul(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        foreach($ids as $id){
            OnlineCourses::where('id', $id)->delete();
        }
        return response()->json(['status' => true,'message'=>"Xóa thành công!"]);
    }
}
