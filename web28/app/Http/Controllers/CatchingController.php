<?php

namespace App\Http\Controllers;

use App\Catching;
use Illuminate\Http\Request;

class CatchingController extends Controller
{
    public function __invoke(){
        $catching=Catching::paginate(5);
        return view('catching',['catching'=>$catching]);
    }
}
