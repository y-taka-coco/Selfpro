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
        $all =Auth::user()->grade()->get();
        $maps = Map::all();
        $img =Auth::user()->grade()->first();

        //もしログインユーザーの権限が管理者ならばリダイレクトする（admin_topに）
        if(Auth::user()->role==0){
            return redirect('/admin_top');
        }

        if(!isset($img)){
            $img =0;
        }else{
            $img = $img['user_id'];
        }

        //総合収支
        $syusi1 = 0;
        $syusi2 = 0;
        foreach($all as $syu){
         $syusi1 +=$syu['income'];//合計
         $syusi2 +=$syu['spending'];//合計
        }
        if($syusi1 > $syusi2){//in>sp
            $syusi3 = $syusi1-$syusi2;
            $syusi4 =0;
        }elseif($syusi1 < $syusi2){//in<sp
            $syusi3 =0;
            $syusi4 = $syusi2-$syusi1;
        }elseif($syusi1 == $syusi2){//in=sp
            $syusi3 =0;
            $syusi4 =0;
        }

        
        
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
       
       $sum4 = $sum1+$sum2+$sum3;//総合回数
       $sum5 = $sum2*2;
       $sum6 = $sum3*3;
       $sum7 = $sum1 + $sum5 + $sum6;

       //平着
       if ($sum4) {
        $avg =sprintf('%.3f', $sum7/$sum4);
        } else {
        $avg = 0;
        }

        //TOP率
        if ($sum1) {
            $sum1 =$sum1;
                if($sum4){
                    $topper = sprintf('%.3f',$sum1/$sum4*100);
                }else{
                    $sum4= 0;
                }
            } else {
            $sum1 = 0;
            $topper = 0;
        }
        //２着率
        if ($sum2) {
            $sum2 =$sum2;
            if($sum4){
                $secper = sprintf('%.3f',$sum2/$sum4*100);
            }else{
                $sum4= 0;
            }
            } else {
            $sum2 = 0;
            $secper = 0;
        }
        //3着率
        if ($sum3) {
            $sum3 =$sum3;
            if($sum4){
                $thiper = sprintf('%.3f',$sum3/$sum4*100);
            }else{
                $sum4= 0;
            }
            } else {
            $sum3 = 0;
            $thiper = 0;
        }

       //複数検索機能

    $hiduke = $request->input('date');
    $omise = $request->input('map_id');
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
            'sokai'=>$sum4,
            'katisum'=>$syusi1,
            'makesum'=>$syusi2,
            'kati'=>$syusi3,
            'make'=>$syusi4,
            'top'=>$topper,
            'sec'=>$secper,
            'thi'=>$thiper,
        ]);

    }
    public function ajaxroute(){
        $maps = Map::paginate(15)->toArray();
        return response()->json(['maps' => $maps]);
    }

}
