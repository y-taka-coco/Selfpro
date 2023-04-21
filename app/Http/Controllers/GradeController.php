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
        // $all = $grade->all()->toArray();
        //$all = $grade->where('user_id',Auth::id());
        $all =Auth::user()->grade()->get();
        $maps = Map::all();
        //dd($all);
        //$top=$all["top"];   
        return view('grade',[
            'grades'=>$all,
            'maps'=>$maps,
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
        return view('grade_new',[
            'maps'=>$maps,
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
        //$grade->map_id =$request->map_id;
        Auth::user()->grade()->save($grade);
        //$grade->save();

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
        //dd($maps);

        return  view('grade_edit',[
            'id' => $grade['id'],
            'result'=>$grade,
            'maps'=>$maps,
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(CreateData $request, Grade $grade)
    {
        $grade->date =$request->date;
        $grade->top =$request->top;
        $grade->second =$request->second;
        $grade->third =$request->third;
        $grade->map_id =$request->map_id;
        // $grade->income =$request->income;
        // $grade->spending =$request->spending;
        //$grade->save();
        Auth::user()->grade()->save($grade);
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
