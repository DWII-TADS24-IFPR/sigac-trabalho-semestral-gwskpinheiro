<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTurmaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'curso_id' => 'required|exists:cursos,id',
            'nivel_id' => 'required|exists:niveis,id',
            'ano' => 'required|integer|between:2000,2100',
        ];
    }
}
