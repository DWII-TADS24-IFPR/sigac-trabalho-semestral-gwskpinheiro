@extends('layouts.app')

@section('title', 'Novo Curso')

@section('content')
    <h1>Novo Curso</h1>
    <form action="{{ route('admin.cursos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}">
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection
