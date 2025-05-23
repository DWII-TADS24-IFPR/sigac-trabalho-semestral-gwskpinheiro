<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDeclaracaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'descricao' => 'required|string|max:255',
            'aluno_id' => 'required|exists:alunos,id',
            'arquivo' => 'nullable|file|mimes:pdf|max:2048', // até 2MB
        ];
    }
}
