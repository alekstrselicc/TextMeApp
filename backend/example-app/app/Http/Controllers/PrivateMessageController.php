<?php

namespace App\Http\Controllers;

use App\Models\privateChat;
use App\Models\privateMessage;
use Illuminate\Http\Request;

class PrivateMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p_messages = privateChat::with('usrs')->get();
        return $p_messages;
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
            'message' => 'required|string',
            'created_at' => 'required',
            'user_id' => 'required',
            'private_chat_id' => 'required',
        ]);
        return privateMessage::create($request->all());
    }


    public function sendMessage(Request $request){
        $user = Auth::user(); 
        $request->validate([
            'message' => 'required|string',
            'created_at' => 'required',
            'user_id' => 'required',
            'private_chat_id' => 'required',
        ]);

        $message = $request->message;

        privateMessage::create($request->all());
        
        broadcast(new MessageSent($user, $message))->toOthers();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $privat_chat = privateChat::where("private_chat_id", $id);

        $array_of_messages = [];

        for($i=0;$i<isset($privat_chat);$i++)
        {
            array_push($array_of_messages, privateMessage::where("private_chat_id",$id)->get());
        }

        return  $array_of_messages;

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p_messsage = privateMessage::destroy($id);
    }
}
