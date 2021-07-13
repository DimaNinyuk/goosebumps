<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'name', 'image','path','year','author',
    ];
    //
    public function genres(){

        return $this->hasMany(GenreTrack::class);
    }
    public function comments(){

        return $this->hasMany(Comment::class);
    }
    public function playlists(){

        return $this->hasMany(TrackPlaylist::class);
    }
    public function likes(){

        return $this->hasMany(Like::class);
    }
    public function dislikes(){

        return $this->hasMany(Dislike::class);
    }


}
