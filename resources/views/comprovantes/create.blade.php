@extends('layouts.app')

@section('title', 'Novo Comprovante')

@section('content')
<div class="container">
    <h1 class="mb-4">Novo Comprovante</h1>

    <form action="{{ route('admin.comprovantes.store') }}" method="POST" enctype="multipart/form-data" class="card shadow p-4">
        @csrf

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição da Atividade</label>
            <input
                type="text"
                name="descricao"
                id="descricao"
                class="form-control"
                value="{{ old('descricao') }}"
                placeholder="Informe a descrição do comprovante"
            >
            @error('descricao')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" id="aluno_id" class="form-select">
                <option value="">Selecione o aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>
                        {{ $aluno->nome }}
                    </option>
                @endforeach
            </select>
            @error('aluno_id')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo (PDF, imagem, etc.)</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control">
            @error('arquivo')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.comprovantes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check-circle me-1"></i> Salvar Comprovante
            </button>
        </div>
    </form>
</div>
@endsection
