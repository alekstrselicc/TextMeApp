<?php

namespace App\Http\Controllers;

use App\Models\privateChat;
use App\Models\privateMessage;
use Illuminate\Http\Request;
use App\Models\Participants;
use App\Events\PrivateMessages; 
use Illuminate\Support\Facades\Auth;


class PrivateMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p_messages = privateMessage::all(); 
        return $p_messages;
    }
    public function GetPrivateMessages()
    {
        $private_messages = privateMessage::all();
        return $private_messages;
    }

    public function getPrivateMesagesChat($id){
        /*
        $par = Participants::where("user_id", $id)->first(); 
        
        $private_msg = privateMessage::where("private_chat_id", $par->private_chat_id)->get(); 
        return $par->private_chat_id; 
        */

        $par = Participants::where("user_id", $id)->get();
        $par1 = Participants::where("user_id", Auth::id())->get(); 
        
        $id = null; 
        
        for ($i=0; $i < count($par); $i++) { 
            for ($j=0; $j < count($par1); $j++) { 
                if($par[$i]->private_chat_id === $par1[$j]->private_chat_id){
                    $id = $par[$i]->private_chat_id;  
                    break; 
                }
            }
        }
        $private_msg = privateMessage::where("private_chat_id", $id)->get(); 
        return $private_msg;  
    }

    public function sendPrivateMessage(Request $request){
        $request->validate([
            'messages' => 'required|string',
            'created_at' => 'required',
            'private_chat_id' => 'required', 
            'user_id' => 'required',
        ]); 

        $message = $request->messages; 

        privateMessage::create($request->all()); 

        broadcast(new PrivateMessages($request->all()));

    }

    public function getPrivateChatId($id){
        //the id is from the user 

        //tukaj se dobi vse elemente, kjer je ta id vpisan 
        $par = Participants::where("user_id", $id)->get();
        $par1 = Participants::where("user_id", Auth::id())->get(); 
        
        for ($i=0; $i < count($par); $i++) { 
            for ($j=0; $j < count($par1); $j++) { 
                if($par[$i]->private_chat_id === $par1[$j]->private_chat_id){
                    return $par[$i]->private_chat_id;  
                }
            }
        }
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
            'messages' => 'required|string',
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
