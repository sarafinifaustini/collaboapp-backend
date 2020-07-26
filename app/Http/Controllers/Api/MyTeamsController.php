<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\addTeams;

class MyTeamsController extends Controller
{
    // public function myTeams(Request $request){
    // $team = myTeams::find($request->id);
    // return response()->json([
    //     'success' => true,
    //     'message' => 'Team added',
    //     'Team' =>$team
    // ]);
    // }


    public function addTeams(Request $request){
      $team = new addTeams;
       $team ->user_id = Auth::user()->id;
      $team->desc =$request->desc;

      $team->newTeam = $request->newTeam;
    //   $team->members = $request->unput('Invite Members');

      $team->save();
      return response()->json([
        'success' => true,
        'message' => 'Team added',
        'Team' =>$team
         
    ]);
      } 
    
    public function exitTeam(Request $request){
        $team = myTeams::find($request->id);
        $team->delete();
        return response()->json([
            'success' => true,
            'message' => 'Deleted'
             
        ]);
    }
    public function update(Request $request){
        $team = myTeams::find($request->id);

        if(Auth::User()->$request->id !=$request->id){
            return response()->json([
                'success' => false,
                'message'=>'Anauthorized access'
            ]);
        }
        $team->desc = $request->desc;
        $team->newTeam =$request->newTeam;
        $team->update();
        return response()->json([
            'success' => true,
            'message' => 'Team name edited'
        ]);
    }
    public function myTeams(){
        $teams = myTeams::orderBy('id','newTeam','desc')->get();
        foreach($teams as $team){
            $team->User;

        }
        return response()->json([
            'success'=>true,
            'teams' =>$teams
        ]);
    }

}
