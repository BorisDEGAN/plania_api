<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class StatistiquesController extends Controller
{
    public function projects_stats()
    {
        return response()->json([
            "data" => [
                "total" => Project::count(),
                "pending" => Project::count(),
                "finished" => Project::count(),
                "canceled" => Project::count(),
            ]
        ]);
    }
}
