<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function news(){
        return $this->hasMany(News::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function ivents(){
        return $this->hasMany(Ivent::class);
    }
    public function lifehack(){
        return $this->hasMany(Lifehack::class);
    }
    public function logistic(){
        return $this->hasMany(logistic::class);
    }
    public function markering(){
        return $this->hasMany(markering::class);
    }
    public function spomb(){
        return $this->hasMany(spomb::class);
    }
    public function storage(){
        return $this->hasMany(Storage::class);
    }
    public function catching(){
        return $this->hasMany(Catching::class);
    }
    public function equipment(){
        return $this->hasMany(Equipment::class);
    }
    public function index(){
        return $this->hasMany(Indexes::class);
    }
}
