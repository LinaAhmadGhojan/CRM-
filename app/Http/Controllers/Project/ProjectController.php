<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Models\{Project,User,Client};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Crypt,Hash};
use App\Http\Requests\{ProjectRequest,ProjectPostRequest};



class ProjectController extends Controller
{



    public function Project()
    {
        $projects=Project::all();
        return view('project.project',compact('projects'));
    }


    public function addproject()
    {

        $users=User::where('role','user')->get();
        $clients=Client::all();
        return view('project.add',['users'=>$users,'clients'=>$clients]);
    }


    public function postAddproject(projectRequest $request)
    {
        $request->validated();
        $input=$request->all();
        project::create($input);
        return to_route('project');

    }


    public function editproject($id)
    {
        $users=User::where('role','user')->get();
        $clients=Client::all();
        $project=project::find($id);
        return view('project.edit',['project'=>$project,'users'=>$users,'clients'=>$clients]);
    }

    public function posteditproject($id,projectPostRequest $request)
    {


        $request->validated();
        $input=$request->all();
        unset($input['_token']);
        project::where('id', $id)->update($input);
        return to_route('project');

    }


    public function delete($id)
    {
        $project=project::find($id);
        $project->delete();
        return to_route('project');
    }



}
