@extends('layouts.app')

@section('title', 'Detalhes da Declaração')

@section('content')
    <h1>Detalhes da Declaração</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $declaracao->id }}</li>
        <li class="list-group-item"><strong>Aluno:</strong> {{ $declaracao->aluno->nome ?? '-' }}</li>
        <li class="list-group-item"><strong>Descrição:</strong> {{ $declaracao->descricao }}</li>
        <li class="list-group-item">
            <strong>Arquivo:</strong>
            @if($declaracao->arquivo)
                <a href="{{ Storage::url($declaracao->arquivo) }}" target="_blank">Download</a>
            @else
                Não enviado
            @endif
        </li>
    </ul>

    <a href="{{ route('admin.declaracoes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
