<?php

namespace App\Http\Controllers\task;

use App\Http\Controllers\Controller;
use App\Models\{Task,User,Project};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Crypt,Hash};
use App\Http\Requests\{TaskRequest,TaskPostRequest};



class TaskController extends Controller
{



    public function task()
    {
        $tasks=Task::all();
        return view('task.task',compact('tasks'));
    }


    public function addtask()
    {

        $users=User::where('role','user')->get();
        $projects=Project::all();
        return view('task.add',['users'=>$users,'projects'=>$projects]);
    }


    public function postAddtask(taskRequest $request)
    {
        $request->validated();
        $input=$request->all();
        Task::create($input);
        return to_route('task');

    }


    public function edittask($id)
    {
        $users=User::where('role','user')->get();
        $projects=Project::all();
        $task=Task::find($id);
        return view('task.edit',['task'=>$task,'users'=>$users,'projects'=>$projects]);
    }

    public function postedittask($id,taskPostRequest $request)
    {


        $request->validated();
        $input=$request->all();
        unset($input['_token']);
        Task::where('id', $id)->update($input);
        return to_route('task');

    }


    public function delete($id)
    {
        $task=Task::find($id);
        $task->delete();
        return to_route('task');
    }



}
