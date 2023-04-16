<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Map;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\User;
use App\Http\Requests\CreateDate;

class UsersController extends Controller
{
    public function index (CreateDate $request){

        $user = new User;
        $all = $user->all()->toArray();

        $sort = $request->sort;
        $maps = Map::paginate(5);
        //dd($maps);

        return view ('admin_top',[
            'users' => $all,
            'maps'=>$maps,
            'sort' => $sort,
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
    public function update(CreateDate $request, User $user){
        

        $user->name = $request->name;
        $user->email =$request->email;
        $user->save();
        return redirect('/admin_top');
    }


}
