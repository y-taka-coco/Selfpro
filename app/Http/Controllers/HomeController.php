<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Map;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $grade = new Grade;
        //$all = $grade->where('user_id',Auth::id());
        $all =Auth::user()->grade()->get();
        $maps = Map::all();
        $img =Auth::user()->grade()->first();

        if(!isset($img)){
            $img =0;
        }else{
            $img = $img['user_id'];
        }
        //$img = $img['user_id'];
        //dd($img);

        //総合収支
        $syusi1 = 0;
        $syusi2 = 0;
        foreach($all as $syu){
         $syusi1 +=$syu['income'];//income
         $syusi2 +=$syu['spending'];
        }
        if($syusi1 > $syusi2){
            $syusi3 = $syusi1-$syusi2;
            $syusi4 =0;
        }elseif($syusi1 < $syusi2){
            $syusi3 =0;
            $syusi4 = $syusi2-$syusi1;
        }elseif($syusi1 == $syusi2){
            $syusi3 =0;
            $syusi4 =0;
        }
        // if(isset($syusi3)){
        //     $syusi3=$syusi3;
        // }elseif(isset($syusi4)){
        //     $syusi3=$syusi4;
        // }
        


       //平均着順
       $sum1 = 0;
       $sum2 = 0;
       $sum3 = 0;
       $sum4 = 0;
       //dd($all);

       foreach($all as $avg){
        $sum1 +=$avg['top'];//topの総回数
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
        if ($sum1) {
            $sum1 =$sum1;
            } else {
            $sum1 = 0;
        }
        if ($sum2) {
            $sum2 =$sum2;
            } else {
            $sum2 = 0;
        }
        if ($sum3) {
            $sum3 =$sum3;
            } else {
            $sum3 = 0;
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

    

        return view('top',[
            'grades'=>$all,
            'maps'=>$maps,
            'avg'=>$avg,
            'img'=>$img,
            'ityaku'=>$sum1,
            'nityaku'=>$sum2,
            'santyaku'=>$sum3,
            'kati'=>$syusi3,
            'make'=>$syusi4,
            // 'exa'=>$serchdate,
        ]);

    }
    // public function mapdata(){
    //     $maps = Map::paginate(15);
    //     return view('admin_top',['maps'=>$maps]);
    // }
    public function ajaxroute(){
        $maps = Map::paginate(15)->toArray();
        //var_dump($maps);
        //dd($maps);
        return response()->json(['maps' => $maps]);
    }

}
