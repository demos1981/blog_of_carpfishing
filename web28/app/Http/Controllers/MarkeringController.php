<?php

namespace App\Http\Controllers;

use App\markering;
use Illuminate\Http\Request;

class MarkeringController extends Controller
{

     public function __invoke(){
       $markering=markering::paginate(5);
       return view('markering',['markering'=>$markering]);

       }


}
