<?php

namespace App\Http\Controllers;

use App\Catching;

use Illuminate\Http\Request;

class SingleCatchingController extends Controller
{
    public function __invoke($id){
        $catching=Catching::where('id','=',$id)->first();
        return view('single_catching',['catching'=>$catching]);

    }
}
