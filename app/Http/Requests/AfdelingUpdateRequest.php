<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AfdelingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         $id = $this->route('id') ?? $this->route('afdeling') ?? null;
         
        return [
             'naam' => [
                'required',
                'string',
                'max:255',
                Rule::unique('afdelingen', 'naam')->ignore($id),
            ],
            'opleiding_id' => 'required|exists:opleidingen,id',
        ];
    }
}