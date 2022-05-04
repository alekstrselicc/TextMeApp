<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Playground;
use Illuminate\Http\Request;
use App\Events\MessageSent;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //GET all channels of playgrounds
    public function index()
    {
        $playground = Playground::with('channels')->get();
        return $playground;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $channel = new Channel;
        $channel->title = $request->input('title');
        $channel->created_at = $request->input('created_at');
        
        $playground = Playground::find(1);
        $playground->channels()->save($channel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //GET all channels of particular playground
    public function show($id)
    {
        $channels = Playground::find($id)->channels;
        return $channels;
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
        $channel = Channel::find($id);
        $channel->update($request->all());
        return $channel;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channel = Channel::destroy($id);
    }
    
    // public function sendMessage(Request $request)
    // {
    //     $message = auth()->user()->messages()->create([
    //         'message' => $request->message
    //     ]);

    //     broadcast(new MessageSent($message->load('user')))->toOthers();

    //     return ['status' => 'success'];
    // }
}
