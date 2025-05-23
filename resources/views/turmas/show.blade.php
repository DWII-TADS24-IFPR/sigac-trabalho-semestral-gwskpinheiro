@extends('layouts.app')

@section('title', 'Detalhes')

@section('content')
    <h1>Detalhes</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $turma->id }}</li>
        <li class="list-group-item"><strong>Nome:</strong> {{ $turma->nome ?? '-' }}</li>
    </ul>
    <a href="{{ route('turmas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection