<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Request;
use App\Http\Resources\User\UserShowResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => $this->user_id,
            'user' => new UserShowResource($this->user),
            'created_at' => $this->created_at->format(config('panel.datetime_format')),
            'updated_at' => $this->updated_at->format(config('panel.datetime_format')),
        ];
    }
}
