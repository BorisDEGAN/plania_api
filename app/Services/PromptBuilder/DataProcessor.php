<?php
namespace App\Services\PromptBuilder;

use Illuminate\Support\Facades\Http;


class  DataProcessor
{
    const GEMINI_ENGINE_API_URL = 'http://localhost:3333/projects/process';
    public static function getProcessedData($project)
    {
        $response = Http::post(self::GEMINI_ENGINE_API_URL, [
            "project" => $project
        ]);

        return json_decode($response->body());
    }
}
