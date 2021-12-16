<?php

namespace App\Http\Controllers;


use App\logistic;
use Illuminate\Http\Request;

class SingleLogisticController extends Controller
{
    public function __invoke($id){
        $logic=logistic::where('id','=',$id)->first();
        return view('single_logistic',['logistic'=>$logic]);

    }
}
