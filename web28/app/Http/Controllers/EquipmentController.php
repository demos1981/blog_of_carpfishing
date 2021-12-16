<?php

namespace App\Http\Controllers;

use App\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function __invoke(){
        $equipment=Equipment::paginate(5);
        return view('equipment',['equipment'=>$equipment]);
    }

}
