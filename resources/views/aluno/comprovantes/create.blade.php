@extends('layouts.app')

@section('title', 'Enviar Comprovante')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Enviar Novo Comprovante</h1>

    <form action="{{ route('aluno.comprovantes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao') }}" required>
            @error('descricao')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="carga_horaria" class="form-label">Carga Horária (horas)</label>
            <input type="number" name="carga_horaria" id="carga_horaria" class="form-control" value="{{ old('carga_horaria') }}" min="1" required>
            @error('carga_horaria')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo (PDF ou Imagem)</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control" required>
            @error('arquivo')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Enviar</button>
        <a href="{{ route('aluno.comprovantes.index') }}" class="btn btn-outline-secondary ms-2">Cancelar</a>
    </form>
</div>
@endsection
