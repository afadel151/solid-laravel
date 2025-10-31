<?php

namespace App\Http\Requests\Week;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

enum Semesters : int
{
    case FIRST = 1;
    case SECOND = 2;
}
class CreateWeekRequest extends FormRequest
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
            'global_week_id'=>'integer|exists:global_weeks,id|required',
            'year_id'=>'integer|exists:years,id|required',
            'semester'=>['required',Rule::enum(Semesters::class)],
        ];
    }
}
