<?php

namespace App\Http\Requests\Sector;

use Illuminate\Foundation\Http\FormRequest;

class CreateSectorRequest extends FormRequest
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
            'sector_name'=> 'string|required',
            'year_id'=> 'integer|exists:years,id|required',
        ];
    }
}
