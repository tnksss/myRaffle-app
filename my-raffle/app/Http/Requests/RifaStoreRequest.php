<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RifaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();    
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'title' => ['required', 'string', 'max:255', 'unique:rifas,title'],
        'slug' => ['required', 'string', 'max:255', 'unique:rifas,slug'],
        'description' => ['nullable', 'string'],
        
        // Regras Financeiras e de Números
        'value' => ['required', 'numeric', 'min:0.01'], // Valor por número
        'total_numbers' => ['required', 'integer', 'min:10'], // Mínimo de 10 cotas
        
        // Data do sorteio (deve ser no futuro)
        'draw_date' => ['required', 'date', 'after:now'],
        'status' => ['required', 'string', 'in:active,inactive'], // Status inicial
    ];
    }
}
