<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Country,Client,Client2};
use App\Http\Traits\SaveFile;

class SecondPageController extends Controller
{
    use SaveFile;
    public function index()
    {

        $countries = Country::all();
        $i=1;
        return view('second_page',compact('countries','i'));
    }

    public function completepassport(Request $request , $id)
    {
        $input=$request->all();
        $input["passport_picture"]=$this->SaveFile($request,'passport_picture',public_path('image\passport'));
        $input["personal_picture"]=$this->SaveFile($request,'personal_picture',public_path('image\personal'));
        $input["id_user"]=$id;

         $information=Client::create($input);
        if($request->first_name1!=null)
        {
           $information2= Client2::create([
            'first_name'=>$input["first_name1"],
            'last_name'=>$input["last_name1"],
                'date_birthday'=>$input["date_birthday1"],
                'gender'=>$input["gender1"],
                'place_birth'=>$input["place_birth1"],
                'country_residency'=>$input["country_residency1"],
                'passport'=>$input["passport1"],
                'date_issue'=>$input["date_issue1"],
                'date_expiry'=>$input["date_expiry1"],
                'place_issue'=>$input["place_issue1"],
                'date_arrival'=>$input["date_arrival1"],
                'profession'=>$input["profession1"],
                'organization'=>$input["organization1"],
                'visa_duration'=>$input["visa_duration1"],
                'status'=>$input["status1"],
               "passport_picture"=>$this->SaveFile($request,'passport_picture1',public_path('image\passport')),
               "personal_picture"=>$this->SaveFile($request,'personal_picture1',public_path('image\personal')),

             ]);
             $information->yes=$information2->id;
             $information->save();

            }
        return to_route('complete.part3',['id'=>$id]);

    }
}
