<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Map;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\User;

class UsersController extends Controller
{
    public function index (Request $request){

        $user = new User;
        $all = $user->all()->toArray();

        $maps = Map::all();
        //dd($all);

        return view ('admin_top',[
            'users' => $all,
            'maps'=>$maps,
        ]);

    }
    
    public function edit(User $user){
        //dd($user);
        $result = $user->find($user);
        return  view('admin_user_edit',[
            'id' => $user['id'],
            'result'=>$user,
        ]);
    }
    public function update(Request $request, User $user){
        

        $user->name = $request->name;
        $user->email =$request->email;
        $user->save();
        return redirect('/admin_top');
    }


}
