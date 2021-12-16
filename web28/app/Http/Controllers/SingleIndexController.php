<?php

namespace App\Http\Controllers;

use App\Indexes;
use App\Ivent;
use Illuminate\Http\Request;

class SingleIndexController extends Controller
{
    public function __invoke($id){
        $home=Indexes::where('id','=',$id)->first();
        return view('single_index',['index'=>$home]);

    }
}
