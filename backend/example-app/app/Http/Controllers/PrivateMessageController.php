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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return privateMessage::find($id);
        
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
