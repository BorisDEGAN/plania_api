<?php
namespace App\Services\PromptBuilder;

use App\Models\Project;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Support\Facades\Http;


class  PromptBuilder
{
    public Project $project;

    public int $duration;

    public float $budget;

    public array $final_data;

    public function __construct()
    {
        $this->project = json_decode(file_get_contents(database_path('data.json')), true);

        $this->final_data = [
            'title' => $this->project->title,
            'description' => $this->project->description,
            'context' => $this->project->context,
            'justification' => $this->project->justification,
            'duration' => $this->project->duration,
            'global_objective' => $this->project->global_objective,
            'intervention_strategy' => $this->project->intervention_strategy,
            'quality_monitoring' => $this->project->quality_monitoring,
            'budget_plan' => $this->project->budget_plan,
            'budget' => $this->project->budget,
            'performance_matrix' => $this->project->performance_matrix,
            'budget_currency' => $this->project->budget_currency,
            'partners' => $this->project->partners,
        ];

    }

    public function generateGrantChart()
    {
        $grant_data_structure = file_get_contents(base_path('app/Services/PromptBuilder/DTO/grant.json'));

        $result = Gemini::geminiPro()->generateContent("Tu es un expert en production de diagramme de Grant, et tu es capable de generer un diagramme de Grant. Avec les données suivantes, \n".json_encode($this->project->calendar).'\n en suivant la structure suivante:'.json_encode($grant_data_structure).'\n soit exhaustif et ne renvois que les donnes json');

        $this->final_data['grant_diagram'] = json_decode($result->text());

        return $result->text();
        // return str_replace('"', '', $result->text());

        // return json_decode($result->text());
    }

    public function generateBudgetPlan()
    {
        $budget_data_structure = file_get_contents(base_path('app/Services/PromptBuilder/DTO/budget.json'));

        $result = Gemini::geminiPro()->generateContent("Tu es un expert en production de ");

        $this->final_data['buget_plan'] = json_decode($result->text());

        return $result->text();
        // return str_replace('"', '', $result->text());

    }

    public function get()
    {
        return $this->final_data;
    }
}
