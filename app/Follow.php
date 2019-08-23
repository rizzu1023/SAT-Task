<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = ['primary_id', 'secondary_id'];

    public function user(){
        return $this->hasMany('App\User',  'primary_id', 'id');
    }

    public function user2(){
        return $this->belongsTo('App\User', 'secondary_id', 'id');
    }


}
