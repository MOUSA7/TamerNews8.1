<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $uploads = '/';

    public function imageable(){
        return $this->morphTo();
    }

    public function path(){
        return ('/storage/'.$this->path);
    }

    public function getfileAttribute($photo){
        return $this->uploads.$this->path;
    }


}
