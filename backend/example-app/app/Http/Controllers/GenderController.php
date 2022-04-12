<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Gender::all();
    }

    public function show($id)
    {
        return Gender::find($id);
    }

    public function destroy($id)
    {
        $gender = Gender::destroy($id);
    }
}
