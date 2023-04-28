<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateData;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade = new Grade;
        $all =Auth::user()->grade()->get();
        $maps = Map::all();
        $img =Auth::user();
        if(!isset($img)){
            $img =0;
        }else{
            $img = $img['id'];
        }
               //成績出す計算式
       $sum1 = 0;
       $sum2 = 0;
       $sum3 = 0;
       $sum4 = 0;

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
        
        return view('grade',[
            'grades'=>$all,
            'maps'=>$maps,
            'img'=>$img,
            'avg'=>$avg,
            'ityaku'=>$sum1,
            'nityaku'=>$sum2,
            'santyaku'=>$sum3,
            'sokai'=>$sum4,
            'top'=>$topper,
            'sec'=>$secper,
            'thi'=>$thiper,
        ]);   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maps = Map::all();
        $img =Auth::user();
        if(!isset($img)){
            $img =0;
        }else{
            $img = $img['id'];
        }

        return view('grade_new',[
            'maps'=>$maps,
            'img'=>$img,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateData $request)
    {
        $grade = new Grade;
        $grade->date = $request->date;
        $grade->top = $request->top;
        $grade->second = $request->second;
        $grade->third = $request->third;
        $grade->income =$request->income;
        $grade->spending =$request->spending;
        $grade->map_id =$request->map_id;
        Auth::user()->grade()->save($grade);

        return redirect('/grades');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        return view('grade_edit')->with('grade', $grade);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //DBからブレードに表示させる為に持って来いよ
       
        $result = $grade->where('user_id',Auth::id())->find($grade);
        $maps = Map::all();
        $img =Auth::user();
        if(!isset($img)){
            $img =0;
        }else{
            $img = $img['id'];
        }


        return  view('grade_edit',[
            'id' => $grade['id'],
            'result'=>$grade,
            'maps'=>$maps,
            'img'=>$img,
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request, Grade $grade,Map $maps)
    {
        $grade->date =$request->date;
        $grade->top =$request->top;
        $grade->second =$request->second;
        $grade->third =$request->third;
        Auth::user()->grade()->save($grade);

        $maps->id =$request->map_id;

        return redirect('/grades');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        return redirect('/');
    }
}
