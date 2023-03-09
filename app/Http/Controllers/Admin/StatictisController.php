<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnlineCourses;
use App\Models\OrderCakes;
use App\Models\OrderCourses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatictisController extends Controller
{
    public function data(){
        return view('admin.statictis1');
    }

    public function course(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $total = OrderCourses::where('status',1)
                ->select(DB::raw('date(created_at) as getDate'), DB::raw('SUM(total) as total'))
                ->groupBy('getDate')
                ->orderBy('getDate', 'ASC')
                ->whereBetween(DB::raw('date(created_at)'), [$from, $to])->get();
        // dd($total);
        foreach ($total as $key => $value) {
            $chart_data[] = array(
                'date'   => date('d/m/Y', strtotime($value->getDate)),
                'total'  => $value->total,
            );
        }
        return $data = json_encode($chart_data);
    }

    public function cake(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $total = OrderCakes::where('status',1)
                ->select(DB::raw('date(created_at) as getDate'), DB::raw('SUM(price) as total'))
                ->groupBy('getDate')
                ->orderBy('getDate', 'ASC')
                ->whereBetween(DB::raw('date(created_at)'), [$from, $to])->get();
        foreach ($total as $key => $value) {
            $chart_data[] = array(
                'date'   => date('d/m/Y', strtotime($value->getDate)),
                'total'  => $value->total,
            );
        }
        return $data = json_encode($chart_data);
    }

    public function statictis(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $total1[] = OrderCourses::where('status',1)
                ->select(DB::raw('date(created_at) as getDate'), DB::raw('SUM(total) as total'))
                ->groupBy('getDate')
                ->orderBy('getDate', 'ASC')
                ->whereBetween(DB::raw('date(created_at)'), [$from, $to])->get();
        $total2[] = OrderCakes::where('status',1)
                ->select(DB::raw('date(created_at) as getDate'), DB::raw('SUM(price) as price'))
                ->groupBy('getDate')
                ->orderBy('getDate', 'ASC')
                ->whereBetween(DB::raw('date(created_at)'), [$from, $to])->get();

        $total = array_merge($total1,$total2);
        foreach ($total as $value) {
            foreach ($value as $key => $data) {
                $chart_data[] = array(
                        'date'   => date('d/m/Y', strtotime($data->getDate)),
                        'total'  => $data->total,
                        'price'  => $data->price,
                    );
            }
        }
        for ($i=0; $i < count($chart_data); $i++) {
            if ($chart_data[$i]['price'] == null) {
                $chart_data[$i]['price'] = 0;
            }
            for ($j=count($chart_data)-1; $j >=0 ; $j--) {
                if ($chart_data[$j]['date'] == $chart_data[$i]['date']) {
                    $chart_data[$i]['price'] = $chart_data[$j]['price'];
                    $chart_data[$j]['total'] = $chart_data[$i]['total'];
                }
            }
        }

        // dd(json_encode(array_unique($chart_data, 0)));
        return $data = json_encode(array_unique($chart_data, 0));
    }

    public function test(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $order = OrderCourses::where('status',1)
                ->select('course_id')
                ->whereBetween(DB::raw('date(created_at)'), [$from, $to])->get();
        $course = OnlineCourses::get();
        foreach ($order as $orders) {
            foreach (explode(',', $orders->course_id) as $item) {
                foreach ($course as $value) {
                    if($item == $value->course_id);
                        $chart_data[] = array(
                            'title'  => $item,
                            'count'  => 1,
                        );
                        // a;
                }
            }
        }
        // for ($i=0; $i < count($chart_data); $i++) {
        //     for ($j=count($chart_data)-1; $j >=0 ; $j--) {
        //         if ($chart_data[$j]['title'] == $chart_data[$i]['title']) {
        //             $chart_data[$i]['count']++;
        //         }
        //     }
        // }
        // dd(array_unique($chart_data, 0));
        dd($chart_data);
        // foreach ($total as $key => $value) {
        //     $chart_data[] = array(
        //         'date'   => date('d/m/Y', strtotime($value->getDate)),
        //         'total'  => $value->total,
        //     );
        // }
        // return $data = json_encode($chart_data);
    }
}
