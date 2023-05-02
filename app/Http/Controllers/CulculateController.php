<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Map;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateData;
use Carbon\Carbon;

class CulculateController extends Controller
{
    public function create() {
        $maps = Map::all();
        $grade = Grade::all();
        $img =Auth::user();
        
        if(!isset($img)){
            $img =0;
        }else{
            $img = $img['id'];
        }

        return view('culculate_new',[
            'maps'=>$maps,
            'img'=>$img,
        ]);
    }
    public function newcreate(CreateData $request){
        $grade = new Grade;
        $grade->date = $request->date;
        $grade->top = $request->top;
        $grade->second = $request->second;
        $grade->third = $request->third;
        $grade->income =$request->income;
        $grade->spending =$request->spending;
        $grade->map_id =$request->map_id;


        Auth::user()->grade()->save($grade);
        //$grade->save();

        return redirect('/culculate');
    }

    public function index(Request $request) {
        $grade = new Grade;
        $now = Carbon::now();
        $chmonth = $request->chmonth;
        if(!isset($chmonth)){
            $month = $now->format('m');
        }else{
            $month = $chmonth;
        }
        $all =Auth::user()->grade()->whereMonth('date',$month)->get();




        $maps = Map::all();
        $img =Auth::user();
        if(!isset($img)){
            $img =0;
        }else{
            $img = $img['id'];
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
                }elseif($syusi1 < $syusi2){//in<sp
                    $syusi3 = $syusi2-$syusi1;
                }elseif($syusi1 == $syusi2){//in=sp
                    $syusi3 =0;
                }
        
        
        return view('culculate',[
            'culculates'=>$all,
            'maps'=>$maps,
            'img'=>$img,
            'katisum'=>$syusi1,
            'makesum'=>$syusi2,
            'keka'=>$syusi3,
            'month'=>$month,
            

        ]); 
    }

    public function show(Grade $grade)
    {
        return view('culculate_edit')->with('grade', $grade);
    }

    public function edit(Int $id)
    {
        $grade = new Grade;
        $result = $grade->find($id);
        $maps = Map::all();
        $img =Auth::user();
        if(!isset($img)){
            $img =0;
        }else{
            $img = $img['id'];
        }

        
        return  view('culculate_edit',[
            'id' => $id,
            'result'=>$result,
            'maps'=>$maps,
            'img'=>$img,
        ]);
    }

    public function update(CreateData $request, Int $id)
    {
        $instance = new Grade;
        $record = $instance->find($id);

        $record->date =$request->date;
        $record->map_id =$request->map_id;
        $record->income =$request->income;
        $record->spending =$request->spending;
        Auth::user()->grade()->save($record);

        
        return redirect('/culculate');
    }

    public function destroy(Int $id){
        $instance = new Grade;
        $record = $instance->find($id);
        $record->delete();
        return redirect('/');
    }























































}
