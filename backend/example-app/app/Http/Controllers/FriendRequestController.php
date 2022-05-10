<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use Illuminate\Http\Request;
use App\Models\User; 
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
            'created_at' => '',
            'sender' => 'required',
            'approver' => 'required',
        ]);
        return FriendRequest::create($request->all());
    }

    public function findByEmail($email){
        $user = User::where("email", $email)->get();
        $res = [
            'auth_id' => Auth::id(), 
            'user_id' => $user[0]->id  
        ];  
        return $res; 
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

    public function destroy(Request $request)
    {
        FriendRequest::destroy($id);
    }
}
