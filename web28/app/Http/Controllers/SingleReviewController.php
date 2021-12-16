<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class SingleReviewController extends Controller
{
    public function __invoke($id){
        $review=Review::where('id','=',$id)->first();
        return view('single_review',['review'=>$review]);

    }
}
