<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $guarded = [];

    public function genre()
    {
        return $this->belongsTo("App\Genre", "genre_id");
    }

    public function actors()
    {
        return $this->belongsToMany("App\Actor", "actor_movie", "movie_id", "actor_id");
    }
}
