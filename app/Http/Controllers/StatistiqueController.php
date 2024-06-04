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
            $counts[$state] = Project::currentStatus($state)->count();
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
            $counts[$state] = ProjectPlan::currentStatus($state)->count();
        }
        return [
            "data"=> $counts
        ];
    }
}
