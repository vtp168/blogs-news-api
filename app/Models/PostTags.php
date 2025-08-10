<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostTags extends Model
{
    protected $table = 'post_tags'; // Specify the table name if it differs from the default
    protected $fillable = ['post_id', 'tag_id'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function tag()
    {
        return $this->belongsTo(Tags::class, 'tag_id');
    }
}
