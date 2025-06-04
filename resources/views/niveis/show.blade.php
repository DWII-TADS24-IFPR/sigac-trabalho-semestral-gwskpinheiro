@extends('layouts.app')

@section('title', 'Detalhes do Nível')

@section('content')
    <h1>Detalhes do Nível</h1>

    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>ID:</strong> {{ $nivel->id }}</li>
        <li class="list-group-item"><strong>Nome:</strong> {{ $nivel->nome ?? '-' }}</li>
    </ul>

    <a href="{{ route('admin.niveis.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
