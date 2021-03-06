<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Town;
use Illuminate\Http\Request;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = Country::with('towns')->get();
        return Town::all(); 
    }

    public function showTown($id){
        return Town::find($id); 
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
            'town' => 'required|string',
            'country_id' => 'required',
        ]);
        return Town::create($request->all());

    }
    //id town pa dobiš državo
    public function GetCountryByTown($id)
    {
        $town = Town::all();

        $towns = [];

        for($i = 0; $i < isset($town); $i++)
        {
            array_push($towns, Town::where("id",$id)->first());
        }

        $countries = [];
        
        for($i = 0; $i < isset($towns); $i++)
        {
            array_push($countries, $towns[$i]->country_id);
        }

        $array = [];
        
        for($i=0; $i < count($countries); $i ++)
        {
            array_push($array, Country::where("id",$countries[$i])->first());

        }
        return $array;

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $towns = Country::find($id)->towns;
        return $towns;
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
        $town = Town::find($id);
        $town->update($request->all());
        return $town;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $town = Town::destroy($id);
    }
}
