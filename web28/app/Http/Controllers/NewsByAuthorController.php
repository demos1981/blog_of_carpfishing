<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class NewsByAuthorController extends Controller
{
   public function __invoke($key)
   {
     $author=Author::where('key','=',$key)->first();

     return view('news_by_authors',['author'=>$author]);
   }

}
