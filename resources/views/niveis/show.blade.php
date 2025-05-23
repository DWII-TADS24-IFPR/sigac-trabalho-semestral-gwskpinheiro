@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>{{ $title }}</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $nivel->id }}</li>
        <li class="list-group-item"><strong>Nome:</strong> {{ $nivel->nome ?? '-' }}</li>
    </ul>
    <a href="{{ route('niveis.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection