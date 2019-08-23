<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['discription','primary_id','secondary_id'];

    public function user(){
        return $this->belongsTo('App\User','primary_id');

    }

    public function user2(){
        return $this->belongsTo('App\User','secondary_id');
    }
}
