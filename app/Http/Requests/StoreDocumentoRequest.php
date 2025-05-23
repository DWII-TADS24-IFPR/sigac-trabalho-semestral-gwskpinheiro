<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'aluno_id' => 'required|exists:alunos,id',
            'categoria_id' => 'required|exists:categorias,id',
            'arquivo' => 'required|file|mimes:pdf|max:10240', // até 10MB
        ];
    }
}
