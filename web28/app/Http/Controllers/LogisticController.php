<?php

namespace App\Http\Controllers;

use App\logistic;
use Illuminate\Http\Request;

class LogisticController extends Controller
{
    public function __invoke()
    {
         $logic=Logistic::paginate(5);
         return view('logistic',['logic'=>$logic]);
    }
}
