<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDeclaracaoRequest extends FormRequest
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
            'arquivo' => 'required|file|mimes:pdf|max:2048',
        ];
    }
}