<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playground;

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
            'title' => 'required'
        ]);
        return Playground::create($request->all());
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
