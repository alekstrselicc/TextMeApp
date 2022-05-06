<?php

namespace App\Http\Controllers;

use App\Models\privateChat;
use App\Models\Participants; 
use App\Models\User; 
use Illuminate\Http\Request;


    
use Illuminate\Support\Facades\Auth; 



class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$participants = privateChat::with('users')->get();
        //return $participants;
    }

    public function show($id)
    {
        $private_chats = participants::where("user_id" ,Auth::id())->get();
        
        $array_of_chats = [];  

        for ($i=0; $i < count($private_chats); $i++) { 
            array_push($array_of_chats, $private_chats[$i]->private_chat_id); 
        }
        $chats = [];
        //all the chats that he is in 
        for ($i=0; $i < count($array_of_chats); $i++) { 
                array_push($chats, participants::where("private_chat_id", $array_of_chats[$i])->get());    
        }
        $friends = []; 
        //all the friends that hes got 
        for ($i=0; $i < count($chats); $i++) { 
            for ($j=0; $j < 2; $j++) { 
                if($chats[$i][$j]->user_id != Auth::id()){
                    array_push($friends, $chats[$i][$j]); 
                }
            }
        }
        $show_friends = []; 
        for ($i=0; $i < count($friends); $i++) { 
            array_push($show_friends, User::find($friends[$i]->user_id)); 
        }
        return $show_friends;
    }

    public function store(Request $request){
        //$participants = privateChat::with('users')->get();
        return Participants::create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //id auth and sender
        
        //$privae_chat = privateChat::find($id);
        $user_id = Auth::id();
        $sender_id = $request->sender_id;
        $user_in_private_chat = [
            "user_id" => Auth::id(),
            "sender_id" => $request->sender_id
        ];

        

 /*

        //privateChat::update('users', $user_in_private_chat); 
        
        $res = privateChat::find($id)->update([
            "users" => $user_in_private_chat
        ]);
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
