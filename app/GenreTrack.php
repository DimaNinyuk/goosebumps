<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenreTrack extends Model
{
    protected $fillable = [
        'track_id', 'genre_id',
    ];
   public function genre(){
       return $this->belongsTo(Genre::class);
   }
   public function track(){
    return $this->belongsTo(Track::class);
}
}
