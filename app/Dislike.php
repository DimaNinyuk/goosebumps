<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    protected $fillable = [
        'user_id', 'track_id', 
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function track(){
        return $this->belongsTo(Track::class);
    }
}
