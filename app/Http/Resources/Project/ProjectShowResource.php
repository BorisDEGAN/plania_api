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
        // return [
        //     'id' => $this->id,
        //     'title' => $this->title,
        //     'description' => $this->description,
        //     'user_id' => $this->user_id,
        //     'user' => new UserShowResource($this->user),
        //     'status' => $this->status,
        //     'context' => $this->context,
        //     'outcomes' => $this->outcomes,
        //     'steps' => $this->steps,
        //     'steps_planning' => $this->steps_planning,
        //     'budget' => $this->budget,
        //     'budget_planning' => $this->budget_planning,
        //     'budget_notes' => $this->budget_notes,
        //     'activities' => $this->activities,
        //     'partners' => $this->partners,
        //     'created_at' => $this->created_at?->format(config('panel.datetime_format')),
        //     'updated_at' => $this->updated_at?->format(config('panel.datetime_format')),
        // ];
        return parent::toArray($request);
    }
}
