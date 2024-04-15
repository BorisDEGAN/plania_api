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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'context' => ['nullable', 'string'],
            'justification' => ['nullable', 'string'],
            'duration' => ['nullable', 'integer'],
            'global_objective' => ['nullable', 'string'],

            'objectives' => ['required', 'array'],
            'objectives.*' => ['required', 'string'],


            'outcomes' => ['required', 'array'],
            'outcomes.*' => ['required', 'array'],
            'outcomes.*.title' => ['required', 'string'],
            'outcomes.*.activities' => ['required', 'array'],
            'outcomes.*.activities.*' => ['required', 'string'],

            'activities' => ['required', 'array'],
            'activities.*' => ['required', 'string'],


            'logical_context' => ['required', 'array'],

            'logical_context.budget' => ['required', 'numeric'],

            'logical_context.objectives' => ['nullable', 'array'],
            'logical_context.objectives.*' => ['nullable', 'string'],
            
            'logical_context.outcomes' => ['required', 'array'],
            'logical_context.outcomes.*' => ['required', 'array'],
            'logical_context.outcomes.*.title' => ['required', 'string'],

            'logical_context.outcomes.*.activities' => ['required', 'array'],
            'logical_context.outcomes.*.activities.*' => ['required', 'array'],

            'logical_context.outcomes.*.activities.title' => ['required', 'string'],

            'logical_context.outcomes.*.activities.intermediate_outcomes' => ['required', 'array'],
            'logical_context.outcomes.*.activities.intermediate_outcomes.*' => ['required', 'string'],

            'logical_context.outcomes.*.activities.efects' => ['required', 'array'],
            'logical_context.outcomes.*.activities.efects.*' => ['required', 'string'],

            'logical_context.outcomes.*.activities.impacts' => ['required', 'array'],
            'logical_context.outcomes.*.activities.impacts.*' => ['required', 'string'],

            'intervention_strategy' => ['nullable', 'string'],
            
            'partners' => ['required', 'array'],
            'partners.*' => ['required', 'array'],
            'partners.*.name' => ['required', 'string'],
            'partners.*.abilities' => ['required', 'array'],
            'partners.*.abilities.*' => ['required', 'string'],
            
            'quality_monitoring' => ['nullable', 'array'],
            'quality_monitoring.*' => ['nullable', 'string'],
            
            'performance_matrix' => ['nullable', 'array'],
            'performance_matrix.*' => ['required', 'array'],
            'performance_matrix.*.effect' => ['required', 'string'],

            'performance_matrix.*.verification_sources' => ['required', 'array'],
            'performance_matrix.*.verification_sources.*' => ['required', 'string'],

            'performance_matrix.*.collect_tools' => ['required', 'array'],
            'performance_matrix.*.collect_tools.*' => ['required', 'string'],

            'performance_matrix.*.frequency' => ['required', 'string'],
            'performance_matrix.*.analyse' => ['required', 'string'],

            'budget_plan' => ['nullable', 'array'],
            'budget_plan.*' => ['required', 'array'],
            'budget_plan.*.section' => ['required', 'string'],
            'budget_plan.*.activities' => ['required', 'array'],
            'budget_plan.*.activities.*' => ['required', 'array'],
            'budget_plan.*.activities.*.title' => ['required', 'string'],
            'budget_plan.*.activities.*.budget' => ['required', 'numeric'],

            'budget_currency' => ['nullable', 'string'],

            'calendar' => ['nullable', 'array'],
            'calendar.*' => ['required', 'array'],
            'calendar.*.outcome' => ['required', 'string'],
            'calendar.*.activities' => ['required', 'array'],
            'calendar.*.activities.*' => ['required', 'array'],
            'calendar.*.activities.*.title' => ['required', 'string'],
            'calendar.*.activities.*.start_date' => ['required', 'datetime'],
            'calendar.*.activities.*.end_date' => ['required', 'datetime'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
      throw new HttpResponseException(
        response()->json($validator->errors(), 422)
      );
    }
}
