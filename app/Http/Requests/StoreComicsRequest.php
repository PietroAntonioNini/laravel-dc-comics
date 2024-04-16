<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComicsRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'thumb' => 'nullable|string',
            'price' => 'required|string',
            'series' => 'nullable|string',
            'sale_date' => 'required|date',
            'type' => 'required|string|max:80',
            'artists.*' => 'nullable|string',
            'writers.*' => 'nullable|string',
        ];
    }

    public function messages(): array  
    {
        return [
            'title.required' => 'Inserisci il Titolo',
            'description.required' => 'Inserisci una descrizione',
            'price.required' => 'Inserisci un prezzo',
            'sale_date.required' => 'Inserisci una data',
            'type.required' => 'Inserisci il tipo',
            
            'max' => 'Il campo :attribute deve avere massimo :max caratteri',
        ];
    }
}
