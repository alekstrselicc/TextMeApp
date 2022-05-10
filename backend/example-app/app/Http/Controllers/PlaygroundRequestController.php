<?php

namespace App\Http\Controllers;

use App\Models\PlaygroundRequest;
use Illuminate\Http\Request;

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
        
    }
}
