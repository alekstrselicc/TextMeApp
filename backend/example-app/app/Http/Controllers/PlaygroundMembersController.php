<?php

namespace App\Http\Controllers;

use App\Models\Playground;
use App\Models\playgroundMember;
use Illuminate\Http\Request;

class PlaygroundMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Playground::with('users')->get();
        return $members;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'joined' => 'required',
            'left' => '', //security issue??
            'user_id' => 'required',
            'playground_id' => 'required',
        ]);
        return playgroundMember::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return playgroundMember::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = playgroundMember::destroy($id);
    }
}
