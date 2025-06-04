@extends('layouts.app')

@section('title', 'Detalhes do Documento')

@section('content')
    <h1>Detalhes do Documento</h1>

    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>ID:</strong> {{ $documento->id }}</li>
        <li class="list-group-item"><strong>Aluno:</strong> {{ $documento->aluno->nome ?? '-' }}</li>
        <li class="list-group-item"><strong>Categoria:</strong> {{ $documento->categoria->nome ?? '-' }}</li>
        <li class="list-group-item"><strong>Nome do Documento:</strong> {{ $documento->nome }}</li>
        <li class="list-group-item"><strong>Arquivo:</strong>
            @if($documento->arquivo)
                <a href="{{ Storage::url($documento->arquivo) }}" target="_blank" class="btn btn-link">Ver Arquivo</a>
            @else
                <span class="text-muted">Não enviado</span>
            @endif
        </li>
    </ul>

    <a href="{{ route('admin.documentos.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
