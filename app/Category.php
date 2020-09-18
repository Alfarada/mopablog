<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    protected $fillable = ['title', 'slug', 'body'];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getUrlAttribute()
    {
        return route("categories.show", [$this->id, $this->slug]);
    }

}
