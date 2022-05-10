<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playground;
use App\Models\playgroundMember; 
use Illuminate\Support\Facades\Auth; 
use App\Models\Channel; 


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
            'playground_id' => $play->id
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

    public function GetAllUsersFromPlayground()
    {
        $playground = playgroundMember::all();
        return $playground;
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
