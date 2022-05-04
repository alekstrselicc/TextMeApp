<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{
    public function index()
    {
        return FriendRequest::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'create_at' => '',
            'sender' => 'required',
            'approver' => 'required',
        ]);
        return FriendRequest::create($request->all());
    }
    public function show($id)
    {
        //return FriendRequest::find($id);
        return FriendRequest::where('approver', '=', $id)->get(); 
    }

    public function destroy($id)
    {
        $playground = FriendRequest::destroy($id);
    }

    public function getOne($sender){
        return FriendRequest::where('sender', '=', $sender)->get();
    }
}
