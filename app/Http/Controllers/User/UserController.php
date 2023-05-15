<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Crypt,Hash};
use App\Http\Traits\SaveFile;
use App\Http\Requests\{UserRequest,UserPostRequest};



class UserController extends Controller
{

    use SaveFile;

    public function user()
    {
        $users=User::where('role','user')->get();
        return view('user.user',compact('users'));
    }


    public function adduser()
    {


        return view('user.add');
    }

    public function postAdduser(UserRequest $request)
    {
        $request->validated();
        $input=$request->all();
        $input["password"]= Hash::make("0000");
        $input["image"]=$this->saveFile($request,"image",public_path('image/user'));
        user::create($input);
        return to_route('user');

    }


    public function edituser($id)
    {
        $user=user::find($id);
        return view('user.edit',['user'=>$user]);
    }

    public function postedituser($id,UserPostRequest $request)
    {


        $request->validated();
        $input=$request->all();
        $input["image"]=$this->saveFile($request,"image",public_path('image/user'));
        unset($input['_token']);
        user::where('id', $id)->update($input);
        return to_route('user');

    }


    public function delete($id)
    {
        $user=user::find($id);
        $user->delete();
        return to_route('user');
    }



}
