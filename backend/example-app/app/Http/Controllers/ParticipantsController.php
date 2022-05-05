<?php

namespace App\Http\Controllers;

use App\Models\privateChat;
use App\Models\Participants; 
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
        //$private_chat = privateChat::where("id", $id)->get();
        //$private_chat = privateChat::with('users')->where("id", $id)->get();
        //$user_in_private_chat = $private_chat->users;
        //return $private_chat;
        

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
