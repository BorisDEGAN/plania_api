<?php

namespace App\Http\Controllers;

use App\Models\ProjectPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ProjectPlan\StoreProjectPlanRequest;
use App\Http\Requests\ProjectPlan\SearchProjectPlanRequest;
use App\Http\Requests\ProjectPlan\UpdateProjectPlanRequest;
use App\Http\Resources\ProjectpPlan\ProjectPlanListResource;
use App\Http\Resources\ProjectpPlan\ProjectPlanShowResource;
use App\Models\Project;

class ProjectPlanController extends Controller
{
    public function index(Request $request)
    {
        $per_page = ($request->per_page > 100) ? 10 : $request->per_page;

        return ProjectPlanListResource::collection(ProjectPlan::orderByDesc('created_at')->paginate($per_page));
    }

    public function search(SearchProjectPlanRequest $request)
    {
        $title = $request->title;
        $description = $request->description;
        $project_plan_id = $request->project_id;
        $status = $request->status;
        $per_page = $request->per_page ?? 10;

        $project_plans = ProjectPlan::with(['project'])->orderByDesc('created_at');

        if($title)
        {
            $project_plans = $project_plans->where('title', 'ILIKE', '%'.$title.'%')
                        ->orWhere('description', 'ILIKE', '%'.$title.'%');
        }

        if($description)
        {
            $project_plans = $project_plans->where('description', 'ILIKE', '%'.$description.'%');
        }

        if($project_plan_id)
        {
            $project_plans = $project_plans->where('project_id', $project_plan_id);
        }

        if($status)
        {
            $project_plans = $project_plans->currentStatus($status);
        }

        return ProjectPlanListResource::collection($project_plans->paginate($per_page));
    }

    public function store(StoreProjectPlanRequest $request)
    {
        $project = Project::find($request->project_id);

        $project_plan = ProjectPlan::create([
            ...collect($project->toArray())->forget('user_id'),
            ...$request->all()
        ]);

        $project_plan->setStatus($request->status ?? ProjectPlan::PENDING_STATE);

        return (new ProjectPlanShowResource($project_plan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProjectPlan $project_plan)
    {
        // abort_if(Gate::denies('project_plan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectPlanShowResource($project_plan->load(['project']));
    }

    public function update(UpdateProjectPlanRequest $request, ProjectPlan $project_plan)
    {
        $project_plan->update($request->all());

        if ($request->status != null) {
            $project_plan->setStatus($request->status);
        }

        return (new ProjectPlanShowResource($project_plan->refresh()))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProjectPlan $project_plan)
    {
        abort_if(Gate::denies('project_plan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project_plan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function genereteWithChanges(Request $request, ProjectPlan $project_plan)
    {
        $duration = $request->duration;
        $budget = $request->budget;
        // $promp_builder = (new PromptBuilder($project_plan));

        // if($duration)
        // {
        //     $promp_builder;
        // }
    }
}
