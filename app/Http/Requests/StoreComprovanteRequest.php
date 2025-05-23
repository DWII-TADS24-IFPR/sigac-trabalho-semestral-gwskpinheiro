<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComprovanteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'aluno_id' => 'required|exists:alunos,id',
            'descricao' => 'required|string|max:255',
            'arquivo' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ];
    }
}