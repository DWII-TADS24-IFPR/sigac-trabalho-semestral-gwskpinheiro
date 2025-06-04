@extends('layouts.app')

@section('title', 'Editar Declaração')

@section('content')
    <h1>Editar Declaração</h1>

    <form action="{{ route('admin.declaracoes.update', $declaracao) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao', $declaracao->descricao) }}">
            @error('descricao')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" id="aluno_id" class="form-select">
                <option value="">Selecione</option>
                @foreach ($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ old('aluno_id', $declaracao->aluno_id) == $aluno->id ? 'selected' : '' }}>{{ $aluno->nome }}</option>
                @endforeach
            </select>
            @error('aluno_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo (PDF)</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control">
            @if ($declaracao->arquivo)
                <small class="d-block mt-2">
                    Arquivo atual: <a href="{{ Storage::url($declaracao->arquivo) }}" target="_blank">Visualizar</a>
                </small>
            @endif
            @error('arquivo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
