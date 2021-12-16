<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    public function author(){
        return $this->belongsTo(Author::class);
    }
}
