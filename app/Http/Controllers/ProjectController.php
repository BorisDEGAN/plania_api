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

        $posts = Project::with(['post_category', 'secteur'])->orderByDesc('created_at');

        if($title)
        {
            $posts = $posts->where('title', 'ILIKE', '%'.$title.'%')
                        ->orWhere('description', 'ILIKE', '%'.$title.'%')
                        ->orWhere('tags', 'ILIKE', '%'.$title.'%');
        }
        
        if($description)
        {
            $posts = $posts->where('description', 'ILIKE', '%'.$description.'%');
        }

        if($user_id)
        {   
            $posts = $posts->where('user_id', $user_id);
        }

        if($status)
        {
            $posts = $posts->currentStatus($status);
        }

        return ProjectListResource::collection($posts->paginate($per_page));
    }

    public function store(StoreProjectRequest $request)
    {
        $post = Project::create($request->all());

        $post->setStatus($request->status ?? Project::PENDING_STATE);

        return (new ProjectShowResource($post))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Project $post)
    {
        abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectShowResource($post->load(['user']));
    }

    public function update(UpdateProjectRequest $request, Project $post)
    {
        $post->update($request->all());

        if ($request->status != null) {
            $post->setStatus($request->status);
        }

        return (new ProjectShowResource($post->refresh()))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Project $post)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}