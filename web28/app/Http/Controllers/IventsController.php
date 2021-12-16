<?php

namespace App\Http\Controllers;


use App\Ivent;
use Illuminate\Http\Request;

class IventsController extends Controller
{
    public function __invoke()
    {
        $ivent=Ivent::paginate(5);

        return view('ivents',['ivent'=>$ivent]);
    }
}
