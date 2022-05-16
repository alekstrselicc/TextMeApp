<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent; 

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $messages = Channel::with('users')->get();
        // return $messages;
        return Message::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$currentDate = Carbon::now();
        $request->validate([
            'messages' => 'required',
            'created_at' => 'required',
            'user_id' => 'required',
            'channel_id' => 'required',
        ]);
        return Message::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Message::find($id);
    }


    public function sendMessage(Request $request){
        $user = Auth::user(); 
        
        $request->validate([
            'messages' => 'required|string',
            'created_at' => 'required',
            'channel_id' => 'required',
        ]);
        //$request->user_id = Auth::user(); 

        $message = $request->messages;

        Message::create($request->all());

        broadcast(new MessageSent($request->all())); 

        //return $message; 
        
    } 


    public function fetchMessage($id){
        //return Message::where("channel_id", $id)->get();     
        //$msg = privateMessage::where("")

        $all_msg = Message::where("channel_id", $id)->get(); 
        
        $res = []; 

        for ($i=0; $i < count($all_msg); $i++) { 
            $user = User::where("id", $all_msg[$i]->user_id)->first(); 
            $user_msg = Message::where("user_id", $all_msg[$i]->user_id)->get(); 

            $obj = [
                "user_id" => $user->id,
                "user_name" => $user->first_name,
                "user_img" =>$user->img, 
                "messages" => $user_msg
            ]; 
            array_push($res, $obj); 
        }

        $result = array();
        foreach ($res as $key => $value){
          if(!in_array($value, $result))
            $result[$key]=$value;
        }

        //return Channel::where("id", $id)->with("users")->get();
        return $all_msg; 
    }



    //show all the messages from specific channelja
    public function showMessagesOfChannel($id)
    {
        $channel = Channel::where("channel_id", $id);

        $array_of_messages = [];

        for($i=0;$i<isset($channel);$i++)
        {
            array_push($array_of_messages, Message::where("channel_id",$id)->get());
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
        $messsage = Message::destroy($id);
    }
}
