<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\SearchProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\Project\ProjectListResource;
use App\Http\Resources\Project\ProjectShowResource;
use App\Services\PromptBuilder;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $per_page = ($request->per_page > 100) ? 10 : $request->per_page;

        return ProjectListResource::collection(Project::orderByDesc('created_at')->paginate($per_page));
    }

    public function search(SearchProjectRequest $request)
    {
        $title = $request->title;
        $description = $request->description;
        $user_id = $request->user_id;
        $status = $request->status;
        $per_page = $request->per_page ?? 10;

        $projects = Project::with(['user'])->orderByDesc('created_at');

        if($title)
        {
            $projects = $projects->where('title', 'ILIKE', '%'.$title.'%')
                        ->orWhere('description', 'ILIKE', '%'.$title.'%');
        }

        if($description)
        {
            $projects = $projects->where('description', 'ILIKE', '%'.$description.'%');
        }

        if($user_id)
        {
            $projects = $projects->where('user_id', $user_id);
        }

        if($status)
        {
            $projects = $projects->currentStatus($status);
        }

        return ProjectListResource::collection($projects->paginate($per_page));
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->all());

        $project->setStatus($request->status ?? Project::PENDING_STATE);

        return (new ProjectShowResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Project $project)
    {
        // abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectShowResource($project->load(['user']));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->all());

        if ($request->status != null) {
            $project->setStatus($request->status);
        }

        return (new ProjectShowResource($project->refresh()))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function genereteWithChanges(Request $request, Project $project)
    {
        $duration = $request->duration;
        $budget = $request->budget;
        // $promp_builder = (new PromptBuilder($project));

        // if($duration)
        // {
        //     $promp_builder;
        // }
    }
}
