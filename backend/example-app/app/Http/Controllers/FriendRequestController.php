<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    /*
    public function showApproverRequests($id)
    {
        // $query = DB::table('friend_requests');
        // $query->where('approver', '=', $approver);
        // $result = $query->get();
        // return $result;
        return FriendRequest::where('approver', '=', $id)->get();
    }

*/
    public function destroy($id)
    {
        $playground = FriendRequest::destroy($id);
    }

    public function getOne($sender){
        return FriendRequest::where('sender', '=', $sender)->get();
    }
}
