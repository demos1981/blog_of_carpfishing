<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __invoke()
    {
        {
            $review=Review::paginate();
            return view('review',['review'=>$review]);
        }

    }
}
