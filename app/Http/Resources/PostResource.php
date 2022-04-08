<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'preview' => $this->preview,
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name,
            ],
            'tags' => $this->tags->map(function ($item) {
                $newItem = [
                    'id' => $item['id'],
                    'name' => $item['name']
                ];
                return $newItem;
            })
        ];
    }
}
