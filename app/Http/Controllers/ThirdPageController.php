<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Room,Client,Country,Client2};
use Illuminate\Support\Facades\Mail;
use App\Mail\FinllyMail;
class ThirdPageController extends Controller
{
    public function index()
    {
        return view('third_page');
    }

    public function completeResidence(Request $request,$id)
    {

        $input=$request->all();
        $input["id_user"]=intval($id);
        $room=Room::create($input);
         $i=1;
         $countries=Country::all();
        $information=Client::where('id_user','=',$id)->latest()->first();
        if($information->yes!=0)
        {

              $information2=Client2::find($information->yes);
              $array = array($information,$information2);

        }
        else{
            $array = array($information);

        }

        $id=$room->id;
         return view('review_page',compact('request','id','array','countries','i'));
    }

    public function review(Request $request,$id)
    {
      $room= Room::find($id);
      $room->check_in_date_eligible=$request->check_in_date_eligible;
      $room->check_out_date_eligible=$request->check_out_date_eligible;
      $room->check_in_date_extra=$request->check_in_date_extra;
      $room->check_out_date_extra=$request->check_out_date_extra;
      $room->save();
      return to_route('
      finall.page');
    }


    public function finall()
    {
       // return ";;";
        Mail::to(auth()->user()->email)->send(new FinllyMail());
        return view('finall_page');
    }
}
