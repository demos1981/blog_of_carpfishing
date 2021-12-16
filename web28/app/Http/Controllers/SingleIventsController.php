<?php

namespace App\Http\Controllers;

use App\Ivent;
use Illuminate\Http\Request;

class SingleIventsController extends Controller
{
    public function __invoke($id){
        $ivent=Ivent::where('id','=',$id)->first();
        return view('single_ivent',['ivent'=>$ivent]);

    }
}
