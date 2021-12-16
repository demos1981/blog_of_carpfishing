<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    public function author(){
        return $this->belongsTo(Author::class);
    }
}
