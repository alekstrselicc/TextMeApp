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
    //GET all channels of playgrounds
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
        $res = $request->validate([
            'title' => 'required', 
            'created_at' => 'required', 
            'playground_id' => 'required',
            'accessibility' => 'required'
        ]); 

        Channel::create($request->all()); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //GET all channels of auth user
    public function show($id)
    {
        /*
        $playground_member = playgroundMember::where("user_id" ,Auth::id())->get();

        $array_of_playgrounds = [];  

        for ($i=0; $i < count($playground_member); $i++) { 
            array_push($array_of_playgrounds, $playground_member[$i]->playground_id); 
        }

        $playgrounds_by_user = [];

        for ($i=0; $i < count($array_of_playgrounds); $i++) { 
            array_push($playgrounds_by_user, Channel::where("playground_id", $array_of_playgrounds[$i])->get());    
        }
        //return all channels of auth user       
        return $playground_member;
        */
        
        return Channel::where("id", $id)->get(); 
    }

    public function userPlaygroundChannels($id)
    {
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

    //id playgrounda
    public function AllChannelsOfPlayground($id)
    {
        $playground = Playground::with('channels')->where("id","=",$id)->get();
        //$playground_id = Playground::where('playground_id',"=",$id)->get();

        $playground_channels = [];

        // for ($i=0; $i < count($playground); $i++) { 
        //     if($playground->playground_id == $id)
        //     {
        //         array_push($playground_channels, Channel::where("playground_id", $playground_channels[$i]->get()));
        //     }
        // }
        return $playground;
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
