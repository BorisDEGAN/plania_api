<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'overview' => ['nullable', 'string'],
            'context' => ['nullable', 'string'],
            'justification' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'duration' => ['nullable', 'integer'],
            'global_objective' => ['nullable', 'string'],

            'objectives' => ['nullable', 'array'],
            'objectives.*' => ['nullable', 'string'],


            'outcomes' => ['nullable', 'array'],
            'outcomes.*' => ['nullable', 'array'],
            'outcomes.*.title' => ['nullable', 'string'],
            'outcomes.*.activities' => ['nullable', 'array'],
            'outcomes.*.activities.*' => ['nullable', 'string'],

            'logical_context' => ['nullable', 'array'],

            'logical_context.budget' => ['nullable', 'numeric'],
            'logical_context.budget_currency' => ['nullable', 'string'],

            'logical_context.objectives' => ['nullable', 'array'],
            'logical_context.objectives.*' => ['nullable', 'string'],
            
            'logical_context.outcomes' => ['nullable', 'array'],
            'logical_context.outcomes.*' => ['nullable', 'array'],
            'logical_context.outcomes.*.title' => ['nullable', 'string'],

            'logical_context.outcomes.*.immediate_outcomes' => ['nullable', 'array'],
            'logical_context.outcomes.*.immediate_outcomes.*' => ['nullable', 'string'],

            'logical_context.outcomes.*.intermediate_outcomes' => ['nullable', 'array'],
            'logical_context.outcomes.*.intermediate_outcomes.*' => ['nullable', 'string'],

            'logical_context.outcomes.*.impacts' => ['nullable', 'array'],
            'logical_context.outcomes.*.impacts.*' => ['nullable', 'string'],

            'logical_context.outcomes.*.activities' => ['nullable', 'array'],
            'logical_context.outcomes.*.activities.*' => ['nullable', 'array'],

            'logical_context.outcomes.*.activities.*.title' => ['nullable', 'string'],

            
            'logical_context.outcomes.*.activities.*.effects' => ['nullable', 'array'],
            'logical_context.outcomes.*.activities.*.effects.*' => ['nullable', 'string'],


            'intervention_strategies' => ['nullable', 'array'],
            'intervention_strategies.*' => ['nullable', 'string'],
            
            'partners' => ['nullable', 'array'],
            'partners.*' => ['nullable', 'array'],
            'partners.*.name' => ['nullable', 'string'],
            'partners.*.abilities' => ['nullable', 'array'],
            'partners.*.abilities.*' => ['nullable', 'string'],
            
            'quality_monitoring' => ['nullable', 'array'],
            'quality_monitoring.*' => ['nullable', 'string'],
            
            'performance_matrix' => ['nullable', 'array'],
            'performance_matrix.*' => ['nullable', 'array'],
            'performance_matrix.*.effect' => ['nullable', 'string'],

            'performance_matrix.*.verification_sources' => ['nullable', 'array'],
            'performance_matrix.*.verification_sources.*' => ['nullable', 'string'],

            'performance_matrix.*.collect_tools' => ['nullable', 'array'],
            'performance_matrix.*.collect_tools.*' => ['nullable', 'string'],

            'performance_matrix.*.frequency' => ['nullable', 'string'],
            'performance_matrix.*.analyse' => ['nullable', 'string'],

            'budget_plan' => ['nullable', 'array'],
            'budget_plan.*' => ['nullable', 'array'],
            'budget_plan.*.section' => ['nullable', 'string'],
            'budget_plan.*.activities' => ['nullable', 'array'],
            'budget_plan.*.activities.*' => ['nullable', 'array'],
            'budget_plan.*.activities.*.title' => ['nullable', 'string'],
            'budget_plan.*.activities.*.budget' => ['nullable', 'numeric'],

            'calendar' => ['nullable', 'array'],
            'calendar.*' => ['nullable', 'array'],
            'calendar.*.outcome' => ['nullable', 'string'],
            'calendar.*.activities' => ['nullable', 'array'],
            'calendar.*.activities.*' => ['nullable', 'array'],
            'calendar.*.activities.*.title' => ['nullable', 'string'],
            'calendar.*.activities.*.start_date' => ['nullable', 'date'],
            'calendar.*.activities.*.end_date' => ['nullable', 'date'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
      throw new HttpResponseException(
        response()->json($validator->errors(), 422)
      );
    }
}
