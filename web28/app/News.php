<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function author(){
     return $this->belongsTo(Author::class);
    }
}
