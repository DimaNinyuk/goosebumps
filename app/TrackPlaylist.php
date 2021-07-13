<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackPlaylist extends Model
{
    public function track(){
        return $this->belongsTo(Track::class);
    }
    public function playlist(){
        return $this->belongsTo(Playlist::class);
    }
}
