@extends('layouts.app')

@section('title', 'Detalhes do Comprovante')

@section('content')
    <h1>Detalhes do Comprovante</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $comprovante->id }}</li>
        <li class="list-group-item"><strong>Descrição:</strong> {{ $comprovante->descricao }}</li>
        <li class="list-group-item"><strong>Aluno:</strong> {{ $comprovante->aluno->nome ?? 'Não informado' }}</li>
        <li class="list-group-item">
            <strong>Arquivo:</strong>
            @if ($comprovante->arquivo)
                <a href="{{ Storage::url($comprovante->arquivo) }}" target="_blank">Ver Arquivo</a>
            @else
                Nenhum arquivo enviado
            @endif
        </li>
    </ul>

    <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
