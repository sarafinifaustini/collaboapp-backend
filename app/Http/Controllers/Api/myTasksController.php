<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class myTasksController extends Controller
{
    public function createTask(Request $request){
        $task = new tasks;
        $task->user_id = Auth::user()->id;
        $task->deadline = $request->deadline;
        $task->task= $request->task;
        $task->save();
        $task->user;

        return response()->json([
            'success'=> true,
            'task'=>$task,
            'message'=> 'task added'
        ]);
        }
        public function editTask(Request $request){
            $task = tasks::find($request->id);
            if($task->id != Auth::user()->id){
                return response()->json([
                    'success'=> false,
                    'message'=>'unauthorized access'
                ]);
            }
            $task->task = $request->task;
            $task->update();

            return response()->json([
                'success' => true,
                'message' => 'task edited'
            ]);
        }
        public function deleteTask(Request $request){
            $task = tasks::find($request->id);
            if($task->user->id != Auth::user()->id){
                return response()->json([
                    'success' => false,
                    'message' => 'unauthorized access'
                ]);
            }
            $task->delete();

            return response()->json([
                'success' => true,
                'message' => 'task deleted'
            ]);
        }
        public function Alltask(Request $request){
            $task = tasks::where('user_id', Auth::user()->id)->orderBy('id','desc','deadline')->get();
            $user = Auth::user();
           return response()->json([
                'success' => true,
                'tasks' => $task,
                'user' => $user
            ]);
            

        }
    
}
