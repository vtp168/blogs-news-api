<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = ['post_id', 'image_path']; // Adjust the fillable fields as needed
    protected $table = 'post_images'; // Specify the table name if it differs from the default

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
