<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'created_by'=>$this->created_at->toDateTimeString(),
            '_links'=>[
                'self'=>[
                    'href'=>route('api.articles.show',['article'=>$this->id]),
                ],
            ],
            '_embedded'=>[
                'user'=>new UserResource($this->whenLoaded('user')),
                'comments'=>CommentResource::collection($this->whenLoaded('comments')),
            ]
            ];
    }
}
