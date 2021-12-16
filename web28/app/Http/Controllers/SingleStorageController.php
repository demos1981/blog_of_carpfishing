<?php

namespace App\Http\Controllers;


use App\Storage;
use Illuminate\Http\Request;

class SingleStorageController extends Controller
{
    public function __invoke($id){
        $storage=Storage::where('id','=',$id)->first();
        return view('single_storage',['storage'=>$storage]);

    }
}
