@extends('layouts.app')

@section('title', 'Editar Nível')

@section('content')
    <h1>Editar Nível</h1>

    <form action="{{ route('admin.niveis.update', $nivel) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $nivel->nome) }}">
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('admin.niveis.index') }}" class="btn btn-outline-secondary ms-2">Cancelar</a>
    </form>
@endsection
