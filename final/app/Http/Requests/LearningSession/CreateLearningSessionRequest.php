<?php

namespace App\Http\Requests\LearningSession;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

enum SessionType: string
{
    case LECTURE = "lecture";
    case LAB = "lab";
    case DW = "dw";
}
enum SessionableType: string
{
    case SECTION = 'App\\Models\\Section';
    case GROUP = 'App\\Models\\Group';
}
class CreateLearningSessionRequest extends FormRequest
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
            'timing_id'=>['required','exists:timings,id'],
            'week_id'=>['required','exists:weeks,id'],
            'room_id'=>['required','exists:rooms,id'],
            'module_id'=>['required','exists:modules,id'],
            'teacher_id'=>['required','exists:teachers,id'],
            'session_date'=> ['required','date'],
            'session_type'=> ['required',Rule::enum(SessionType::class)],
            'sessionable_type'=>['required',Rule::enum(SessionableType::class)],
        ];
    }
}
