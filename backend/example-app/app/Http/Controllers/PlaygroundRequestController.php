<?php

namespace App\Http\Controllers;

use App\Models\PlaygroundRequest;
use Illuminate\Http\Request;
use App\Models\User; 


class PlaygroundRequestController extends Controller
{
    public function index()
    {
        return PlaygroundRequest::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'sender' => 'required',
            'playground_id' => 'required',
        ]);
        return PlaygroundRequest::create($request->all());
    }
    public function show($id)
    {
        $playReq = PlaygroundRequest::where("playground_id", $id)->get();
        
        $playground_request_users = []; 

        for ($i=0; $i < count($playReq); $i++) { 
            array_push($playground_request_users, User::where("id", $playReq[$i]->sender)->get()); 
        }
        
        return $playground_request_users; 
    }
}
