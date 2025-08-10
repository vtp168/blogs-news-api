<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts'; // Specify the table name if it differs from the default
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category_id',
        'image',
        'slug',
    ];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function tags() {
        return $this->belongsToMany(Tag::class,'post_tags', 'post_id', 'tag_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images() {
        return $this->hasMany(PostImage::class, 'post_id');
    }
    

}
