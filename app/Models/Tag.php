<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Post;


class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags'; // Specify the table name if it differs from the default
    protected $fillable = ['name', 'slug'];

    /**
     * Get the posts associated with the tag.
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags', 'tag_id', 'post_id');
    }
}
