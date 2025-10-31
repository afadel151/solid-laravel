<?php

namespace App\Http\Requests\LearningSession;

use Illuminate\Foundation\Http\FormRequest;

class LearningSessionFBARequest extends FormRequest
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
            'attributes' => ['required', 'array'],
            'attributes.timing_id' => ['integer'],
            'attributes.teacher_id' => ['integer'],
            'attributes.module_id' => ['integer'],
            'attributes.room_id' => ['integer'],
            'attributes.week_id' => ['integer'],
        ];
    }
}
