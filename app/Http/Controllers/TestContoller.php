<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Http;
use App\Services\PromptBuilder\PromptBuilder;

class TestContoller extends Controller
{
    public function test(Request $request)
    {
        $data = new PromptBuilder();

        return $data->generateGrantChart();
    }
}
