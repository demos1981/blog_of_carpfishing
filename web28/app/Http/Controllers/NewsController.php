<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __invoke()
    {
      $news=News::paginate(5);
      return view('news',['news'=>$news]);
    }
}
