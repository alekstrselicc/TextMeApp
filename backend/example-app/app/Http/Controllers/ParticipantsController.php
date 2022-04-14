<?php

namespace App\Http\Controllers;

use App\Models\privateChat;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = privateChat::with('users')->get();
        return $participants;
    }

    public function show($id)
    {
        $private_chat = privateChat::find($id);
        $user_in_private_chat = $private_chat->users->first();
        return $user_in_private_chat;
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
