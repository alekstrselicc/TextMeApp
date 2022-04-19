<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Channel::with('users')->get();
        return $messages;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id, $user_id)
    {
        // $channel = new Channel();
        // $channel->channel = $request->input('channel');
        // $channel->save();
        // $channel->users()->attach($id,$request->input('messages'));
        $message = new Message();
        $message->messages = $request->input('messages');
        $message->save();

        //$channel = Channel::find($id); //not sure, ask!
        //$channel->save();

        //$user_id = User::find($user_id); //not sure, ask!
        
        //trenutni datum
        $currentDate = Carbon::now()->toDateString();
        
        $user = new User();
        $user->channels()->attach(3,[
            'messages' => $message,
            'created_at' => $currentDate,
            'user_id' => $user_id,
            'channel_id' => $id
          ]);
          
        //$user->channels()->attach($request->channels);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
