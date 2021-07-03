<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'category_id', 'content', 'image', 'slug', 'users_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tag', 'posts_id', 'tags_id');
    }
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }

}
