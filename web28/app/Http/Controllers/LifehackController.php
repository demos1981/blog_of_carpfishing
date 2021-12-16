<?php

namespace App\Http\Controllers;

use App\Lifehack;
use Illuminate\Http\Request;

class LifehackController extends Controller
{
    public function __invoke()
    {
        $life=Lifehack::paginate(5);
        return view('lifehack',['life'=>$life]);
    }
}
