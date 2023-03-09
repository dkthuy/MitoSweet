<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cakes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CakesController extends Controller
{
    public function data(){
        $cake = DB::table('cakes')->orderByDesc('id')->paginate(5);
        $type = DB::table('cake_types')->get();
        $size = DB::table('cake_sizes')->get();
        return view('admin.cakes',['cake' => $cake, 'size' => $size, 'type' => $type]);
    }

    public function add(Request $request){
        if($request->isMethod('post')){
            DB::beginTransaction();
            try{
                $cake              = new Cakes();

                $db  = [];
                $db  = explode(',', $request->filepath); // file là chuỗi -> mảng
                // bỏ local ở từng tp của mảng
                for ($i=0; $i < count($db); $i++) {
                    $db[$i] = str_replace('http://localhost','', $db[$i]);
                }
                $img = implode(',', $db); // lưu về dạng mảng

                $cake->img         = $img;
                $cake->title       = $request->title;
                $cake->summary     = $request->summary;
                $cake->detail      = $request->detail;
                $cake->note        = $request->note;
                // $type              = CakeTypes::select('id')->where('title', $request->type)->first();
                $cake->cake_types  = $request->type;
                $cake->code        = $request->code;
                $cake->price       = $request->price;

                if ($request->size != '') {
                    $size          = implode(",", $request->size); // Thêm vào chuỗi
                } else {
                    $size          = $request->size;
                }
                $cake->cake_sizes  = $size;

                $cake->save();
                DB::commit();
                return redirect()->back()->with('status', 'Thêm bánh thành công!');
            }
            catch (\Exception $exception){
                DB::rollBack();
                // return $exception->getMessage();
                return redirect()->back()->with('fail', 'Không thêm được!');
            }
        }
        return view('admin.cakes');
    }

    public function edit(Request $request, $id){
        $cake = Cakes::find($id);
        if($request->isMethod('post')){
            $db  = [];
            $db  = explode(',', $request->filepath); // file là chuỗi -> mảng
            // bỏ local ở từng tp của mảng
            for ($i=0; $i < count($db); $i++) {
                $db[$i] = str_replace('http://localhost','', $db[$i]);
            }
            $img = implode(',', $db); // lưu về dạng mảng

            $cake->img         = $img;
            $cake->title       = $request->title;
            $cake->summary     = $request->summary;
            $cake->detail      = $request->detail;
            $cake->note        = $request->note;
            // $type              = CakeTypes::select('id')->where('title', $request->type)->first();
            $cake->cake_types  = $request->type;
            $cake->code        = $request->code;
            $cake->price       = $request->price;

            if ($request->size != '') {
                $size          = implode(",", $request->size);
            } else {
                $size          = $request->size;
            }
            $cake->cake_sizes  = $size;

            $cake->save();
            return redirect()->back()->with('status', 'Sửa bánh thành công!');
        }
        return redirect()->back();
    }

    public function delete($id){
        $cake = Cakes::find($id);
        $cake->delete();
        return redirect()->back()->with('status', 'Xóa bánh thành công!');
    }

    public function deleteMul(Request $request){
        $ids = $request->ids;
        $ids = explode(',', $ids);
        foreach($ids as $id){
            Cakes::where('id', $id)->delete();
        }
        return response()->json(['status' => true,'message'=>"Xóa thành công!"]);
    }
}
