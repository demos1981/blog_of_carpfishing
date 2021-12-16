<?php

namespace App\Http\Controllers;

use App\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function __invoke(){
        $storages=Storage::paginate(5);
        return view('storages',['storages'=>$storages]);
    }
}
