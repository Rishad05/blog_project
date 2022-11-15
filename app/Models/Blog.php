<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function authorInfo(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
    // public function comments(){
    //     return $this->hasMany(Comment::class)->whereNull('parent_id');
    // }

}
