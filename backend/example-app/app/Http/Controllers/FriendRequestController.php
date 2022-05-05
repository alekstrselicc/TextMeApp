<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 
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
    
    public function showApproverRequests($id)
    {
        return FriendRequest::where('approver', "=" , Auth::id())->where("sender", $id)->get(); 
    }

    public function destroy($id)
    {
        $playground = FriendRequest::destroy($id);
    }
}
