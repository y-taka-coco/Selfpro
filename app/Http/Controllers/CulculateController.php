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
        $grade = Grade::all();
        return view('culculate_new',[
            'maps'=>$maps,
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

    public function index() {
        $grade = new Grade;
        $all =Auth::user()->grade()->get();
        $maps = Map::all();
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
