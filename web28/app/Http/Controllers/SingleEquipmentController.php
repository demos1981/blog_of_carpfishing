<?php

namespace App\Http\Controllers;

use App\Equipment;

use Illuminate\Http\Request;

class SingleEquipmentController extends Controller
{
    public function __invoke($id){
        $equipment=Equipment::where('id','=',$id)->first();
        return view('single_equipment',['equipment'=>$equipment]);

    }
}
