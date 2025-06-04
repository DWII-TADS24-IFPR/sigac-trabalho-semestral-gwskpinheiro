@extends('layouts.app')

@section('title', 'Detalhes da Turma')

@section('content')
    <h1>Detalhes da Turma</h1>

    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>ID:</strong> {{ $turma->id }}</li>
        <li class="list-group-item"><strong>Nome:</strong> {{ $turma->nome ?? '-' }}</li>
        <li class="list-group-item"><strong>Curso:</strong> {{ $turma->curso->nome ?? '-' }}</li>
        <li class="list-group-item"><strong>Nível:</strong> {{ $turma->nivel->nome ?? '-' }}</li>
        <li class="list-group-item"><strong>Ano:</strong> {{ $turma->ano }}</li>
    </ul>

    <a href="{{ route('admin.turmas.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('admin.turmas.edit', $turma) }}" class="btn btn-warning">Editar</a>
@endsection
