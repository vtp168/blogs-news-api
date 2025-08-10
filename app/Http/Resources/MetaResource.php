<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MetaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
          'tags' => $this['tags']->map(function ($tag) {
                return [
                    'value' => $tag->id,
                    'label' => $tag->name,
                    // 'slug' => $tag->slug,
                ];
            }),
            'categories' =>  $this['categories']->map(function ($cate) {
                return [
                    'id' => $cate->id,
                    'name' => $cate->name,
                    // 'slug' => $tag->slug,
                ];
            }),
        ];

        //   return [
        //     'categories' => $this['categories'],
        //     'tags' => $this['tags'],
        // ];
    }
}
