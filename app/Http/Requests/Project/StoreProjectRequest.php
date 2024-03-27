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
            'outcomes' => ['nullable', 'array'],
            'steps' => ['nullable', 'array'],
            'steps_planning' => ['nullable', 'array'],
            'budget' => ['nullable', 'array'],
            'budget_planning' => ['nullable', 'array'],
            'budget_notes' => ['nullable', 'array'],
            'activities' => ['nullable', 'array'],
            'user_id' => ['nullable', 'exists:users,id'],
            'partners' => ['nullable', 'array'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
      throw new HttpResponseException(
        response()->json($validator->errors(), 422)
      );
    }
}
