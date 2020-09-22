<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{   
    // use ModelHelpers;

    protected $fillable = ['title','slug'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getUrlAttribute()
    {
        return route("tags.show", [$this->id, $this->slug]);
    }
}
