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
            'global_objective' => ['nullable', 'string'],

            'objectives' => ['nullable', 'array'],
            'objectives.*' => ['nullable', 'string'],

            'duration' => ['nullable', 'integer'],
            'budget' => ['nullable'],
            'budget_currency' => ['nullable', 'string'],

            "scopes" => ['nullable', 'array'],
            "scopes.*.intervention_zone" => ['nullable', 'string'],
            "scopes.*.male_beneficiary" => ['nullable', 'integer'],
            "scopes.*.female_beneficiary" => ['nullable', 'integer'],
            "scopes.*.total_beneficiary" => ['nullable', 'integer'],

            'logical_context' => ['nullable', 'array'],

            'logical_context.impact' => ['nullable', 'string'],

            'logical_context.intermediate_outcomes' => ['nullable', 'array'],
            'logical_context.intermediate_outcomes.*' => ['nullable', 'array'],
            'logical_context.intermediate_outcomes.*.title' => ['nullable', 'string'],
            'logical_context.intermediate_outcomes.*.immediate_outcomes' => ['nullable', 'array'],
            'logical_context.intermediate_outcomes.*.immediate_outcomes.*' => ['nullable', 'array'],
            'logical_context.intermediate_outcomes.*.immediate_outcomes.*.title' => ['nullable', 'string'],
            'logical_context.intermediate_outcomes.*.immediate_outcomes.*.activities' => ['nullable', 'array'],
            'logical_context.intermediate_outcomes.*.immediate_outcomes.*.activities.*' => ['nullable', 'array'],
            'logical_context.intermediate_outcomes.*.immediate_outcomes.*.activities.*.title' => ['nullable', 'string'],
            'logical_context.intermediate_outcomes.*.immediate_outcomes.*.activities.*.effect' => ['nullable', 'string'],

            'intervention_strategies' => ['nullable', 'array'],
            'intervention_strategies.*' => ['nullable', 'string'],

            'partners' => ['nullable', 'array'],
            'partners.managment_levels' => ['nullable', 'array'],
            'partners.managment_levels.*' => ['nullable', 'array'],
            'partners.managment_levels.*.title' => ['nullable', 'string'],
            'partners.managment_levels.*.level' => ['nullable', 'string'],
            'partners.managment_levels.*.stakeholders' => ['nullable', 'array'],
            'partners.managment_levels.*.stakeholders.*' => ['nullable', 'array'],
            'partners.managment_levels.*.stakeholders.*.name' => ['nullable', 'string'],
            'partners.managment_levels.*.stakeholders.*.abilities' => ['nullable', 'array'],
            'partners.managment_levels.*.stakeholders.*.abilities.*' => ['nullable', 'string'],

            'acquisition_plan' => ['nullable', 'array'],
            'acquisition_plan.*' => ['nullable', 'array'],
            'acquisition_plan.*.period' => ['nullable', 'array'],
            'acquisition_plan.*.period.from' => ['nullable', 'string'],
            'acquisition_plan.*.period.to' => ['nullable', 'string'],
            'acquisition_plan.*.acquisitions' => ['nullable', 'array'],
            'acquisition_plan.*.acquisitions.*' => ['nullable', 'array'],
            'acquisition_plan.*.acquisitions.*.type' => ['nullable', 'string'],
            'acquisition_plan.*.acquisitions.*.quantity' => ['nullable', 'integer'],
            'acquisition_plan.*.acquisitions.*.unit_price' => ['nullable', 'integer'],

            'infrastructures_plan' => ['nullable', 'array'],
            'infrastructures_plan.*' => ['nullable', 'array'],
            'infrastructures_plan.*.locality' => ['nullable', 'string'],
            'infrastructures_plan.*.type' => ['nullable', 'string'],
            'infrastructures_plan.*.period' => ['nullable', 'array'],
            'infrastructures_plan.*.period.from' => ['nullable', 'string'],
            'infrastructures_plan.*.period.to' => ['nullable', 'string'],
            'infrastructures_plan.*.description' => ['nullable', 'string'],
            'infrastructures_plan.*.cost' => ['nullable', 'integer'],


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
