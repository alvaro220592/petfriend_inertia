<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    public function index(){
        return response()->json(State::all());    
    }

    public function stateCity(){
        return response()->json( State::with('cities')->get());
    }

    public function stateCities($state_id){
        return response()->json( State::find($state_id)->cities);
    }
}
