@extends('layouts.app')

@section('title', 'Editar Documento')

@section('content')
    <h1>Editar Documento</h1>
    <form action="{{ route('admin.documentos.update', $documento) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" id="aluno_id" class="form-select">
                <option value="">Selecione</option>
                @foreach ($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ old('aluno_id', $documento->aluno_id) == $aluno->id ? 'selected' : '' }}>{{ $aluno->nome }}</option>
                @endforeach
            </select>
            @error('aluno_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-select">
                <option value="">Selecione</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id', $documento->categoria_id) == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                @endforeach
            </select>
            @error('categoria_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Documento</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $documento->nome) }}">
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control">
            @if ($documento->arquivo)
                <small class="d-block mt-2">
                    Atual: <a href="{{ Storage::url($documento->arquivo) }}" target="_blank">Ver Arquivo</a>
                </small>
            @endif
            @error('arquivo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
