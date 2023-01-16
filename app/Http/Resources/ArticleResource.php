<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            "title" => $this->title,
            "subject" => $this->subject,
            "user" => $this->user,
            "created_at" => $this->created_at->diffForHumans()
        ];
    }

    public function with($request)
    {
        return ["status" => "success"];
    }
}
