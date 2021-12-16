<?php

namespace App\Http\Controllers;

use App\spomb;
use Illuminate\Http\Request;

class SpombController extends Controller
{
    public function __invoke(){
        $spomb=spomb::paginate(5);
        return view('spombing',['spombing'=>$spomb]);
    }

}
