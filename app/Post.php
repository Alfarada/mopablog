<?php

namespace App;

use App\ModelHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    use ModelHelpers;

    protected $fillable = [
        'user_id'   ,'category_id',
        'title'     ,'slug',
        'excerpt'   ,'body',
        'status'    ,'file'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getUrlAttribute()
    {
        return route("posts.show", [$this->id, $this->slug]);
    }

}
