<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function data(){
        $page      = DB::table('pages')->get();
        $interface = DB::table('interfaces')->where('pages_id', 1)->get();
        $onl = array();
        $off = array();
        $cake = array();
        $onl['online']  = DB::table('online_courses')->latest()->first();
        $cake['cake']   = DB::table('cakes')->latest()->first();
        return view('user.index', ['page' => $page, 'interface' => $interface, 'online' => $onl, 'cake' => $cake]);
    }

    public function about(){
        $page      = DB::table('pages')->get();
        $interface = DB::table('interfaces')->where('pages_id', 5)->get();
        return view('user.aboutme', ['page' => $page, 'interface' => $interface]);
    }

    // public function offline(){
    //     $interface = DB::table('interfaces')->where('pages_id', 3)->get();
    //     $level     = DB::table('course_levels')->get();
    //     $off       = DB::table('offline_courses')->orderByDesc('id')->paginate(9);
    //     return view('user.offlineclass', ['interface' => $interface, 'level' => $level, 'offline' => $off]);
    // }
    // public function offdetail($id){
    //     // $interface = DB::table('interfaces')->where('pages_id', 3)->get();
    //     $level     = DB::table('course_levels')->get();
    //     $offline   = DB::table('offline_courses')->where('id', $id)->get();
    //     $off       = DB::table('offline_courses')->get();
    //     return view('user.offlineclassdetail', ['level' => $level, 'offline' => $offline, 'off' => $off]);
    // }

    public function online(){
        $interface = DB::table('interfaces')->where('pages_id', 2)->get();
        $level     = DB::table('course_levels')->get();
        $onl       = DB::table('online_courses')->orderByDesc('id')->paginate(9);
        return view('user.onlineclass', ['interface' => $interface, 'level' => $level, 'online' => $onl]);
    }
    public function ondetail($id){
        $level     = DB::table('course_levels')->get();
        $online    = DB::table('online_courses')->where('id', $id)->get();
        $onl       = DB::table('online_courses')->get();
        return view('user.onlineclassdetail', ['level' => $level, 'online' => $online, 'onl' => $onl]);
    }

    public function order(){
        $interface = DB::table('interfaces')->where('pages_id', 4)->get();
        $cake      = DB::table('cakes')->orderByDesc('id')->paginate(12);
        $type      = DB::table('cake_types')->get();
        return view('user.order', ['interface' => $interface, 'cake' => $cake, 'type' => $type]);
    }
    public function orderdetail($id){
        $cake      = DB::table('cakes')->where('id', $id)->get();
        $cakes     = DB::table('cakes')->get();
        $type      = DB::table('cake_types')->get();
        $size      = DB::table('cake_sizes')->get();
        return view('user.orderdetail', ['cake' => $cake, 'type' => $type, 'size' => $size, 'cakes' => $cakes]);
    }

    public function news(){
        $news     = DB::table('news')->orderByDesc('id')->paginate(9);
        $interface = DB::table('interfaces')->where('pages_id', 1)->get();
        return view('user.news', ['news' => $news, 'interface' => $interface]);
    }
    public function newsdetail($id){
        $news = DB::table('news')->where('id', $id)->get();
        $new  = DB::table('news')->get();
        $new  = $new->toArray();
        return view('user.newsdetail', ['news' => $news, 'new' => $new]);
    }

    public function free(){
        $free     = DB::table('free_tutorials')->orderByDesc('id')->paginate(9);
        $interface = DB::table('interfaces')->where('pages_id', 1)->get();
        return view('user.freetutorials', ['free' => $free, 'interface' => $interface]);
    }

    public function contact(){
        $interface = DB::table('interfaces')->where('pages_id', 1)->get();
        return view('user.contacts',['interface' => $interface]);
    }

    public function class($id){
        $level     = DB::table('course_levels')->get();
        $online    = DB::table('online_courses')->where('id', $id)->get();
        $onl       = DB::table('online_courses')->get();
        return view('user.classdetail', ['level' => $level, 'online' => $online, 'onl' => $onl]);
    }


}
