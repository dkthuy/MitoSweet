<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FreeTutorials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FreeTutorialsController extends Controller
{
    public function data(){
        $freetutorials = DB::table('free_tutorials')->paginate(5);
        return view('admin.freetutorials',['freetutorial' => $freetutorials]);
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $freetutorials = new FreeTutorials();
                $freetutorials->title   = $request->title;
                $video = $request->video;
                $video = str_replace('https://www.youtube.com/embed/','', $video);

                $freetutorials->video  = $video;
                $freetutorials->save();
                DB::commit();
                return redirect('freetutorials')->with('status', 'Thêm hướng dẫn thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                return redirect('freetutorials')->with('fail', 'Không thêm được!');
            }
        }
        return view('admin.freetutorials');
    }
    public function edit(Request $request, $id){
        $freetutorials = FreeTutorials::find($id);
        if($request->isMethod('post')){
            $freetutorials->title   = $request->title;
            $video = $request->video;
            $video = str_replace('https://www.youtube.com/embed/','', $video);

            $freetutorials->video  = $video;
            $freetutorials->save();
            return redirect('freetutorials')->with('status', 'Sửa hướng dẫn thành công!');
        }
        return redirect('freetutorials');
    }

    public function delete($id){
        $freetutorials = FreeTutorials::find($id);
        $freetutorials->delete();
        return redirect('freetutorials')->with('status', 'Xóa hướng dẫn thành công!');
    }

    public function deleteMul(Request $request)
    {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        foreach($ids as $id){
            FreeTutorials::where('id', $id)->delete();
        }
        return response()->json(['status' => true,'message'=>"Xóa thành công!"]);
    }

    // public function search(Request $request){
    //     $freetutorials = FreeTutorials::where('title', 'like', '%' . $request->search . '%')
    //                 ->paginate(5);
    //     return view('admin.freetutorials',['freetutorial' => $freetutorials]);
    // }
}
