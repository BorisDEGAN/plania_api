<?php

namespace App\Http\Controllers;

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
        Browsershot::html('<h1>Hello world!!</h1>')->save(storage_path('pdf/test.pdf'));
    }
}
