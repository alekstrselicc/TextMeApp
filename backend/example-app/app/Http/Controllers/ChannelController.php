<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Playground;
use Illuminate\Http\Request;
use App\Models\playgroundMember;
use Illuminate\Support\Facades\Auth;


class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Channel::all();
    }
    //GET all channels of playgrounds
    public function ChannelByPlayground()
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
        // $channel = new Channel;
        // $channel->title = $request->input('title');
        // $channel->created_at = $request->input('created_at');
        
        // $playground = Playground::find(1);
        // $playground->channels()->save($channel);
        $request->validate([
            'title' => 'required',
            'created_at' => 'required',
            'playground_id' => 'required',
        ]);
        return Channel::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //GET all channels of particular playground
    public function show()
    {
        // $channels = Playground::find($id)->channels;
        // return $channels;

        $playground_member = playgroundMember::where("user_id" ,Auth::id())->get();
        
        //return $playground_member;
        
        $array_of_playgrounds = [];  

        for ($i=0; $i < count($playground_member); $i++) { 
            array_push($array_of_playgrounds, $playground_member[$i]->playground_id); 
        }
        //return $array_of_playgrounds;
        //return count($array_of_playgrounds);
       
        $playgrounds_by_user = [];

        for ($i=0; $i < count($array_of_playgrounds); $i++) { 
            array_push($playgrounds_by_user, Channel::where("playground_id", $array_of_playgrounds[$i])->get());    
        }
        //return all channels of auth user       
        return $playgrounds_by_user;

    }
    public function userPlaygroundChannels($id)
    {
        // $channels = Playground::find($id)->channels;
        // return $channels;

        $playground_member = playgroundMember::where("user_id" ,Auth::id())->get();
        
        $array_of_playgrounds = [];  

        for ($i=0; $i < count($playground_member); $i++) { 
            array_push($array_of_playgrounds, $playground_member[$i]->playground_id);
        }

        $array_of_channels = [];

        for($i=0; $i < count($array_of_playgrounds); $i++){
            if($id == $array_of_playgrounds[$i])
            {
                array_push($array_of_channels, Channel::where("playground_id", $array_of_playgrounds[$i])->get());
            }
        }
        return $array_of_channels;
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
