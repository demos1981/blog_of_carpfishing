<?php

namespace App\Http\Controllers;


use App\spomb;
use Illuminate\Http\Request;

class SingleSpombController extends Controller
{
    public function __invoke($id){
        $spomb=spomb::where('id','=',$id)->first();
        return view('single_spomb',['spomb'=>$spomb]);

    }
}
