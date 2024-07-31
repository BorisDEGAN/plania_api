<?php
namespace App\Services\PromptBuilder;

use Illuminate\Support\Facades\Http;


class  DataProcessor
{
    // const GEMINI_ENGINE_API_URL = 'http://159.203.86.163:3333/projects/process';
    const GEMINI_ENGINE_API_URL = 'http://localhost:3333/projects/process';
    public static function getProcessedData($project, $new_budget, $new_duration)
    {
        $response = Http::withOptions(['timeout' => 1200])->post(self::GEMINI_ENGINE_API_URL, [
            "project" => [
                ...$project->toArray(),
                "new_budget" => $new_budget,
                "new_duration" => $new_duration
            ]
        ]);

        return json_decode($response->body(), true);
    }
}
