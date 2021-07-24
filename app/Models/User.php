<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'photo_id'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public function photo(){
        return $this->morphOne(Photo::class,'imageable');
    }


    public function hasAbility($permission){
        $role = $this->role;
        if (!$role){
            return false;
        }
        foreach ($role->permissions as $key=>$value){
            if (is_array($permission) && in_array($value ,$permission)){
                return true;
            }elseif (is_string($permission) && strcmp($permission,$value) == 0){
                return true;
            }
        }
        return false;
    }
}
