<?php

namespace App\Http\Controllers;

use App\Map;
use App\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MapData;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maps = Map::all();
        $img =Auth::user();
        if(!isset($img)){
            $img =0;
        }else{
            $img = $img['id'];
        }
        return view('admin_map_new',[
            'maps'=>$maps,
            'img'=>$img,
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
        return view('admin_map_new',[
            'maps'=>$maps,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MapData $request)
    {
        //mapの新規作成
        $map = new Map;
        $map->shopname = $request->shopname;
        $map->address = $request->address;
        $map->save();
        return redirect('/admin_top');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function show(Map $map)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function edit(Map $map)
    {
        $result =$map->find($map);
        return  view('admin_map_edit',[
            'id'=>$map['id'],
            'result'=>$map,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function update(MapData $request, Map $map)
    {
        $map->shopname = $request->shopname;
        $map->address = $request->address;
        $map->save();
        return redirect('/admin_top');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Map  $map
     * @return \Illuminate\Http\Response
     */
    public function destroy(Map $map)
    {
        $map->delete();
        return redirect('/admin_top');
    }
}
