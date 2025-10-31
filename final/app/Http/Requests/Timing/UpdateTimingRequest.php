<?php

namespace App\Http\Requests\Timing;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTimingRequest extends FormRequest
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
            'id'=>'integer|required|exists:timings,id',
            'session_start'=> ['required', 'regex:/^(?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d$/'],
            'session_finish'=> ['required', 'regex:/^(?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d$/'] 
        ];
    }
}
