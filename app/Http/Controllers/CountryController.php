<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Http\Requests\FirstPageRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class CountryController extends Controller
{
    public function index()
    {

        $countries = Country::all();
        return view('first_page',compact('countries'));
    }

    public function sendemailforcomplete(Request $request)
    {
        $user= auth()->user();

        $validated = $request->validate([
            'id_country'   => 'required',
            'phone' => 'required|numeric',
            'opt1'=>'required',
            'opt2'=>'required',
            'opt3'=>'required',
            'opt4'=>'required',
        ]);

         $user1=User::where('email',$user->email)->first();
        if(!$user)
        {
                 $input=$request->all();
                 $input["password"]= Hash::make($request->opt1.$request->opt2.$request->opt3.$request->opt4);
                 $user= User::create($input);

        }
        else{

            $user1->password= Hash::make($request->opt1.$request->opt2.$request->opt3.$request->opt4);
            $user1->phone=$request->phone;
            $user1->save();
        }

        Mail::to($user->email)->send(new WelcomeMail());
        return back()->with('message',"Your information has been submitted successfully , and send email to complete information");

    }
}
