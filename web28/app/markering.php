<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class markering extends Model
{
    public function author(){
        return $this->belongsTo(Author::class);
    }
}
