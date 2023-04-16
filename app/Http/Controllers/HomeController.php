<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Map;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Http\Requests\CreateDate;

class HomeController extends Controller
{
    public function index(CreateDate $request)
    {
        $grade = new Grade;
        //$all = $grade->where('user_id',Auth::id());
        $all =Auth::user()->grade()->get();
        $maps = Map::all();
        //dd($all);

       //平均着順
       $sum1 = 0;
       $sum2 = 0;
       $sum3 = 0;
       $sum4 = 0;

       foreach($all as $avg){
        $sum1 +=$avg['top'];
        $sum2 +=$avg['second'];
        $sum3 +=$avg['third'];
       }
       $sum4 = $sum1+$sum2+$sum3;
       $sum5 = $sum2*2;
       $sum6 = $sum3*3;
       $sum7 = $sum1 + $sum5 + $sum6;
       //$avg =$sum7/$sum4;
       if ($sum4) {
        $avg =$sum7/$sum4;
        } else {
        $avg = 0;
    }

       //複数検索機能

    $hiduke = $request->input('date');
    $omise = $request->input('map_id');
    //var_dump($hiduke);
    //dd($omise);
    if($hiduke && $omise){
        $exa = Grade::where('date','like','%'.$hiduke.'%')->where('map_id','like','%'.$omise.'%')->get();
        $all=$exa;
    }

    //$serchdate = Grade::where('date','like','%'.$hiduke.'%')->where('map_id','like','%'.$omise.'%')->get();
    
    

    //    $kensaku_date = $request->input('date');
    //    $kensaku_map = $request->input('map_id');

    //    if(!empty($kensaku_date) && !empty($kensaku_map)){
    //     $serchdate = Grade::where('date','like','%'.$kensaku_date.'%')->first();
    //     $serchmap = Map::where('shopname','like','%'.$kensaku_map.'%')->first();

    //     if($serchdate && $serchmap){
    //         $serchdate = $serchdate->id;
    //         $serchmap = $serchmap->id;
    //         $serchdate = Grade::where('id',$serchdate)->where('map_id',$serchmap)->orderBy('id','asc')->paginate(30);
            
    //         if($serchdate->isEmpty()){
    //             return view('top',[
    //                 'kensaku'=>null,
    //                 'date'=>$kensaku_date,
    //                 'maps'=>$kensaku_map,
    //             ]);
    //         }
    //         return view('top',[
    //             'kensaku'=>null,
    //             'date'=>$kensaku_date,
    //             'maps'=>$kensaku_map,
    //         ]);
    //     }
    //     return view('top',[
    //         'kensaku'=>null,
    //         'date'=>$kensaku_date,
    //         'maps'=>$kensaku_map,
    //     ]);

    //    }

       



        return view('top',[
            'grades'=>$all,
            'maps'=>$maps,
            'avg'=>$avg,
            // 'exa'=>$serchdate,
        ]);

        


















        
    }
}
