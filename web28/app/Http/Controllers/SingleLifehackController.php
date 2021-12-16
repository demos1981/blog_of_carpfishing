<?php

namespace App\Http\Controllers;


use App\Lifehack;
use Illuminate\Http\Request;

class SingleLifehackController extends Controller
{

    public function __invoke($id){
        $lifehack=Lifehack::where('id','=',$id)->first();
        return view('single_lifehack',['lifehack'=>$lifehack]);

    }
}
