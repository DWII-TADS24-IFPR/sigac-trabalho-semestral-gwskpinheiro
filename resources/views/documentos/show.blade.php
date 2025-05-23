@extends('layouts.app')

@section('title', 'Detalhes do Documento')

@section('content')
    <h1>Detalhes do Documento</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $documento->id }}</li>
        <li class="list-group-item"><strong>Aluno:</strong> {{ $documento->aluno->nome ?? '-' }}</li>
        <li class="list-group-item"><strong>Categoria:</strong> {{ $documento->categoria->nome ?? '-' }}</li>
        <li class="list-group-item"><strong>Nome:</strong> {{ $documento->nome }}</li>
        <li class="list-group-item"><strong>Arquivo:</strong>
            @if($documento->arquivo)
                <a href="{{ Storage::url($documento->arquivo) }}" target="_blank">Download</a>
            @else
                Não enviado
            @endif
        </li>
    </ul>
    <a href="{{ route('documentos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
