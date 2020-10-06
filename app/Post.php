<?php

namespace App;

use App\ModelHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function lastestComments()
    {
        return $this->comments()->orderBy('created_at', 'DESC');
    }

    public function countComments()
    {
        return $this->comments()->count();
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getUrlAttribute()
    {
        return route("posts.show", [$this->id, $this->slug]);
    }

    public function storeFile($request)
    {
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $this->fill(['file' => asset($path)])->save();
        }
    }

}
