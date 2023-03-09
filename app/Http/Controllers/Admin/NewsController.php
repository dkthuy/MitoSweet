<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    public function data(){
        $news = DB::table('news')->paginate(5);
        return view('admin.news',['new' => $news]);
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $news = new News();
                $news->title   = $request->title;
                $news->summary = $request->summary;
                $news->detail  = $request->detail;
                $img = $request->filepath;
                $img = str_replace('http://localhost','', $img);;
                $news->img  = $img;
                $news->save();
                DB::commit();
                return redirect('news')->with('status', 'Thêm tin tức thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                // return $exception->getMessage();
                return redirect('news')->with('fail', 'Không thêm được!');
            }
        }
        return view('admin.news');
    }

    public function edit(Request $request, $id){
        $news = News::find($id);
        if($request->isMethod('post')){
            $news->title   = $request->title;
            $news->summary = $request->summary;
            $news->detail  = $request->detail;
            $img = $request->filepath;
            $img = str_replace('http://localhost','', $img);;
            $news->img  = $img;
            $news->save();
            return redirect('news')->with('status', 'Sửa tin tức thành công!');
        }
        return redirect('news');
    }

    public function delete($id){
        $news = News::find($id);
        $news->delete();
        return redirect('news')->with('status', 'Xóa tin tức thành công!');
    }

    public function deleteMul(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        foreach($ids as $id){
            News::where('id', $id)->delete();
        }
        return response()->json(['status' => true,'message'=>"Xóa thành công!"]);
        // if ($request->has('delete')){
        //     $ids = $request->delete;
        //     foreach($ids as $id){
        //         News::where('id', $id)->delete();
        //     }
        //     return redirect('news')->with('status', 'Xóa thành công!');
        // }else{
        //     return redirect('news')->with('fail', 'Không có tin tức được chọn!');
        // }
    }

    // public function search(Request $request){
    //     $news = News::where('title', 'like', '%' . $request->search . '%')
    //                 ->orWhere('summary', 'like', '%' . $request->search . '%')
    //                 ->paginate(5);
    //     return view('admin.news',['new' => $news]);
    // }
}
