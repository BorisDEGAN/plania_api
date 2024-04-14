<?php
namespace App\Services;

use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Http;


class PromptBuilder
{
    public $project;

    public array $final_data;

    public function __construct()
    {
        $this->project = json_decode(file_get_contents(database_path('data.json')), true);
        
        $this->final_data = [
            ...$this->project,
        ];
    }

    public function generateGrantChart()
    {
        $garant_data_structure = file_get_contents(base_path('app/Services/grant_data.json'));

        $result = Gemini::geminiPro()->generateContent("Tu es un expert en production de diagramme de Grant, et tu es capable de generer un diagramme de Grant. avec la data suivante: \n".json_encode($this->project['resultat_attendus']).'\n en suivant la structure suivante:'.json_encode($garant_data_structure).'\n soit exhaustif et ne renvois que les donnes json');
        return $result->text();
        // return json_decode($result->text());
    }
}
