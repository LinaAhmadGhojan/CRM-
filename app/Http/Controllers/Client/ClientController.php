<?php

namespace App\Http\Controllers\Client;

use App\Models\{Client};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\{ClientRequest,ClientPostRequest};
use App\Http\Traits\SaveFile;


class ClientController extends Controller
{

    use SaveFile;

    public function client()
    {
        $clients=Client::all();
        return view('client.client',compact('clients'));
    }


    public function addClient()
    {


        return view('client.add');
    }

    public function postAddClient(ClientRequest $request)
    {
        $request->validated();
        $input=$request->all();
        $input["image"]=$this->saveFile($request,"image",public_path('image/client'));
        Client::create($input);
        return to_route('client');

    }


    public function editClient($id)
    {
        $client=Client::find($id);
        return view('client.edit',['client'=>$client]);
    }

    public function posteditClient($id,ClientPostRequest $request)
    {


        $request->validated();
        $input=$request->all();
        $input["image"]=$this->saveFile($request,"image",public_path('image/client'));
        unset($input['_token']);
        Client::where('id', $id)->update($input);
        return to_route('client');

    }


    public function delete($id)
    {
        $client=Client::find($id);
        $client->delete();
        return to_route('client');
    }




}
