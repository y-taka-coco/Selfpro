<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Map;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateData;

class CulculateController extends Controller
{
    public function create() {
        $maps = Map::all();
        return view('grade_new',[
            'maps'=>$maps,
        ]);
    }

    public function index() {
        $grade = new Grade;
        $all =Auth::user()->grade()->get();
        $maps = Map::all();
        //dd($all);
        //$top=$all["top"];   
        return view('culculate',[
            'culculates'=>$all,
            'maps'=>$maps,
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
        //dd($result);
        
        return  view('culculate_edit',[
            'id' => $id,
            'result'=>$result,
            'maps'=>$maps,
        ]);
    }

    public function update(CreateData $request, Int $id)
    {
        $instance = new Grade;
        $record = $instance->find($id);

        $record->date =$request->date;
        // $record->top =$request->top;
        // $record->second =$request->second;
        // $record->third =$request->third;
        $record->map_id =$request->map_id;
        $record->income =$request->income;
        $record->spending =$request->spending;
        //$record->save();
        Auth::user()->grade()->save($record);
        return redirect('/culculate');
    }

    public function destroy(Int $id){
        $instance = new Grade;
        $record = $instance->find($id);
        //dd($record);
        $record->delete();
        return redirect('/');
    }























































}
