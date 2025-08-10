<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'id'    => $this->id,
        'title' => $this->title,
        'body' => $this->body,
        'thumbnail' => $this->image,
        'category' => $this->category ? [
            'id' => $this->category->id,
            'name' => $this->category->name,
            'name_kh' => $this->category->name_kh
        ] : null,
        'tags' => $this->tags ? $this->tags->map(function ($tag) {
            return [
                'id' => $tag->id,
                'name' => $tag->name,
                // 'slug' => $tag->slug,
            ];
        }) : [],
        'author' => [
            'id' => $this->author->id ?? null,
            'name' => $this->author->name ?? null,
        ],
        'is_active'=>$this->is_active,
        'is_publish'=>$this->is_publish,
        'created_at' => $this->created_at,
    ];
    }
}
