<?php

namespace App\Http\Controllers;

use App\Models\Playground;
use App\Models\playgroundMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PlaygroundRequest; 

class PlaygroundMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return playgroundMember::all(); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'joined' => 'required',
            'left' => '', //security issue??
            'user_id' => 'required',
            'playground_id' => 'required',
        ]);
        //a member is created 
        playgroundMember::create($request->all());

        //destroy the pending request

        $req = PlaygroundRequest::where("playground_id", $request->playground_id)->where("sender",$request->user_id)->get(); 

        PlaygroundRequest::destroy($req[0]->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sort()
    {
        $playground_member = playgroundMember::where("user_id" ,Auth::id())->get();
        
        $array_of_playgrounds = [];  

        for ($i=0; $i < count($playground_member); $i++) { 
            array_push($array_of_playgrounds, $playground_member[$i]->playground_id); 
        }

        $his_playgrounds= []; 

        //all the playgrounds that he is in 
        for ($i=0; $i < count($array_of_playgrounds); $i++) { 
                array_push($his_playgrounds, playgroundMember::where("playground_id", $array_of_playgrounds[$i])->get());    
        }

        $playground_member_table = []; 

        for ($i=0; $i < count($his_playgrounds); $i++) { 
            for ($j=0; $j < 2; $j++) { 
                if($his_playgrounds[$i][$j]->user_id != Auth::id()){
                    array_push($playground_member_table, $his_playgrounds[$i][$j]); 
                }
            }
        }
        
        $show_playgrounds = []; 

        for ($i=0; $i < count($playground_member_table); $i++) { 
            array_push($show_playgrounds, Playground::find($playground_member_table[$i]->playground_id)); 
        }
        
        return $show_playgrounds;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = playgroundMember::destroy($id);
    }
}
