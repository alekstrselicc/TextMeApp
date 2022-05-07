<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


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
            'messages' => 'required|string',
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
    //show all the messages from specific channelja
    public function showMessagesOfChannel($id)
    {
        //$channel_member = Message::where("user_id" ,Auth::id())->get();

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
