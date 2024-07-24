<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Http;
use App\Services\PromptBuilder\PromptBuilder;

class TestContoller extends Controller
{
    public function test(Request $request)
    {
        return (new PromptBuilder(Project::first()))->generateGenreEqualityStrategies();
    }
}
