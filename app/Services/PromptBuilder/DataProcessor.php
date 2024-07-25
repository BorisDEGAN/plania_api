<?php
namespace App\Services\PromptBuilder;

use Illuminate\Support\Facades\Http;


class  DataProcessor
{
    const GEMINI_ENGINE_API_URL = 'http://159.223.216.243:3333/projects/process';
    public static function getProcessedData($project)
    {
        $response = Http::post(self::GEMINI_ENGINE_API_URL, [
            "project" => $project
        ]);

        return json_decode($response->body());
    }
}
