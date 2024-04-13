<?php
namespace App\Services;

use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Http;


class PromptBuilder
{
    public array $project;

    public array $final_data;

    public function __construct()
    {
        $this->project = json_decode(file_get_contents(database_path('data.json')), true);
        $this->final_data = [];
    }

    public function generateGrantDiagram()
    {
        $result = Gemini::geminiPro()->generateContent('en utilisant cette data, génere moi un diagramme de Grant des activites sachant qu\'on a une semaine; \n'.json_encode($this->project['resultat_attendus']));
        return $result->text();
        // return json_decode($result->text());
    }
}
