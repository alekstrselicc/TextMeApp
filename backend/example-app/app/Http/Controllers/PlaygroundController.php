<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playground;
use App\Models\playgroundMember; 
use Illuminate\Support\Facades\Auth; 
use App\Models\Channel; 
use App\Models\User;
use App\Models\Participants;

class PlaygroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //GET
    public function index()
    {
        return Playground::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //POST
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'img' => 'required'
        ]);

        $play = Playground::create($request->all());

        $member = [
            'left' => '2002-03-12 13:13:13', 
            'joined' => '2002-03-12 13:13:13',
            'user_id' => Auth::id(), 
            'playground_id' => $play->id
        ]; 

        $channel = [
            'title' => 'General',
            'created_at' => '2002-03-12 13:13:13', 
            'playground_id' => $play->id, 
            'accessibility' => 'public'
        ]; 

        Channel::create($channel);
        playgroundMember::create($member); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //GET/id
    public function show($id)
    {
        return Playground::find($id);
    }

    public function findByName($name)
    {
        return Playground::where("title", $name)->get();
    }

    public function findByChannel($id){
        return Channel::where('id', $id)->get(); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //PUT
    public function update(Request $request, $id)
    {
        $playground = Playground::find($id);
        $playground->update($request->all());
        return $playground;
    }

    public function getWithChannels(){ 
       
        //returna vse playgorundes z njihovimi channeli
        $playground = Playground::with('channels')->get();
        
        //returna vse memberje ki imajo user id od autha
        $playground_member = playgroundMember::where("user_id" ,Auth::id())->get();

        $the_return = []; 

        for ($i=0; $i < count($playground_member); $i++) { 
            for ($j=0; $j < count($playground); $j++) { 
                if($playground_member[$i]->playground_id == $playground[$j]->id){
                    array_push($the_return, $playground[$j]); 
                }
            }
        }
        return $the_return; 
    }

    public function GetAllUsersFromPlayground($id)
    {
        $channel = Channel::where("id", $id)->first(); 

        $meb = playgroundMember::where("playground_id", $channel->playground_id)->get(); 
        
        $users = User::all(); 

        $arr = []; 

        for ($i=0; $i < count($meb); $i++) { 
            for ($j=0; $j < count($users); $j++) { 
                if($meb[$i]->user_id == $users[$j]->id){
                    array_push($arr, $users[$j]); 
                }
            }
        }
        return $arr; 


    }
    public function GetUserFromChannel($id)
    {
        $channel = Channel::where("id",$id)->get();
        
        $playground = [];
        for($i = 0; $i < isset($channel); $i++)
        {
            array_push($playground, $channel[$i]->playground_id);
        }

        $array_playground_member = [];
        for($i = 0; $i < count($playground); $i++){
            array_push($array_playground_member, playgroundMember::where("playground_id",$playground[$i])->get("user_id"));
        }
        
        $temp = $array_playground_member[0]; 

        $users = []; 

        for ($i=0; $i < count($temp); $i++) { 
            array_push($users, User::where("id", $temp[$i]->user_id)->get()); 
        }

        return $users; 
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //DELETE
    public function destroy($id)
    {
        $playground = Playground::destroy($id);
    }
}
