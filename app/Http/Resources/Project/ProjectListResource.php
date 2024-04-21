<?php

namespace App\Http\Resources\Project;

use Illuminate\Http\Request;
use App\Http\Resources\User\UserListResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectListResource extends JsonResource
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
            'overview' => $this->overview,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'user' => new UserListResource($this->user),
            'created_at' => $this->created_at->format(config('panel.datetime_format')),
            'updated_at' => $this->updated_at->format(config('panel.datetime_format')),
        ];
    }
}
