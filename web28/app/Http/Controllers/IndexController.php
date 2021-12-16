<?php

namespace App\Http\Controllers;


use App\Index;
use App\Indexes;
use App\News;
use App\Review;
use Illuminate\Http\Request;




class IndexController extends Controller
{
  public function __invoke()
  {
      $home=Indexes::paginate(5);
      return view('index',['index'=>$home]);
  }
}
