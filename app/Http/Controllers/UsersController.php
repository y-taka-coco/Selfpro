<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use App\Map;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\User;
use App\Http\Requests\UserData;

class UsersController extends Controller
{
    public function index (Request $request){

        $user = new User;
        $all = $user->all()->toArray();

        $sort = $request->sort;
        $maps = Map::paginate(15);

        $img =Auth::user();
        if(!isset($img)){
            $img =0;
        }else{
            $img = $img['id'];
        }

        return view ('admin_top',[
            'users' => $all,
            'maps'=>$maps,
            'sort' => $sort,
            'img'=>$img,
        ]);

    }
    
    public function edit(Int $id){
        $user = new User;
        $result = $user->find($id);
        $img =Auth::user();
        if(!isset($img)){
            $img =0;
        }else{
            $img = $img['id'];
        }

        return  view('admin_user_edit',[
            'id' => $id,
            'result'=>$result,
            'img'=>$img,
        ]);
    }
    public function destroy(Int $id)
    {
        $instance = new User;
        $record = $instance->find($id);
        $record->delete();
        return redirect('/admin_top');
    }


    public function update(UserData $request, User $user){
        

        $user->name = $request->name;
        $user->email =$request->email;
        $user->save();    
        return redirect('/admin_top');
    }

    public function userupdate(UserData $request, User $user){
        $user->name = $request->name;
        $user->email =$request->email;
        if($request->post_img){

            if($request->post_img->extension() == 'gif' 
            || $request->post_img->extension() == 'jpeg' 
            || $request->post_img->extension() == 'jpg' 
            || $request->post_img->extension() == 'png')
            {

            $request->file('post_img')
            ->storeAs('public/post_img', $user->id.'.'.$request->post_img->extension());

            }
        }
        $user->save(); 
        return redirect('/');
    }
    public function useredit(User $user){
        $result = $user->find($user);
        $img =Auth::user();
        if(!isset($img)){
            $img =0;
        }else{
            $img = $img['id'];
        }
        return  view('user_edit',[
            'id' => $user['id'],
            'result'=>$user,
            'img'=>$img,
        ]);
    }

    



}
