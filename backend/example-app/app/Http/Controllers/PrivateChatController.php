<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\privateChat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Participants; 
use App\Models\FriendRequest;

class PrivateChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return privateChat::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $private_chat = privateChat::create();
    
        $response_sender = [
            'user_id' => $request->user_id, 
            'private_chat_id' => $private_chat->id
        ]; 
        $response_approver = [
            'user_id' => Auth::id(), 
            'private_chat_id' => $private_chat->id  
        ]; 
        Participants::create($response_sender);
        Participants::create($response_approver);

        $pend_id = FriendRequest::where("approver", Auth::id())->where("sender", $request->user_id)->get(); 
        FriendRequest::destroy($pend_id[0]->id); 
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
        $playground = privateChat::destroy($id);
    }
}
