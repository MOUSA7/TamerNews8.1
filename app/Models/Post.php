<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
}

    public function photo(){
        return $this->morphOne(Photo::class,'imageable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function url(){
        return '/storage/'.$this->photo->path;
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }

//    public function setPhotoIdAttribute($value){
//        $this->attributes['photo_id'] = $value->photo()->id;
//    }

}
