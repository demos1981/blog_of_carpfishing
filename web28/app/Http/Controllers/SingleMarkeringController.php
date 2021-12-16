<?php

namespace App\Http\Controllers;

use App\markering;

use Illuminate\Http\Request;

class SingleMarkeringController extends Controller
{
    public function __invoke($id){
        $markering=markering::where('id','=',$id)->first();
        return view('single_markering',['markering'=>$markering]);

    }
}
