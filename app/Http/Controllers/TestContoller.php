<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PromptBuilder;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Http;

class TestContoller extends Controller
{
    public function test(Request $request)
    {
        $data = new PromptBuilder();

        return $data->generateGrantDiagram();
    }
}
