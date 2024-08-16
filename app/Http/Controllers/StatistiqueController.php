<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectPlan;
use Illuminate\Http\Request;

class StatistiqueController extends Controller
{
    public function projectCount()
    {
        $counts = [];
        foreach(Project::STATES as $state)
        {
            $counts[$state] = Project::where('user_id', auth()->id())->currentStatus($state)->count();
        }
        return [
            "data"=> $counts
        ];
    }

    public function projectPlanCount()
    {
        $counts = [];
        foreach(ProjectPlan::STATES as $state)
        {
            $counts[$state] = ProjectPlan::where('user_id', auth()->id())->currentStatus($state)->count();
        }
        return [
            "data"=> $counts
        ];
    }
}
