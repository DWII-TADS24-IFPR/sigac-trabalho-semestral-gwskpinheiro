@extends('layouts.app')

@section('title', 'Detalhes do Comprovante')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalhes do Comprovante</h1>

    <ul class="list-group mb-4">
        <li class="list-group-item"><strong>ID:</strong> {{ $comprovante->id }}</li>
        <li class="list-group-item"><strong>Descrição:</strong> {{ $comprovante->descricao }}</li>
        <li class="list-group-item"><strong>Aluno:</strong> {{ $comprovante->aluno->nome ?? 'Não informado' }}</li>
        <li class="list-group-item"><strong>Status:</strong>
            <span class="badge bg-{{ $comprovante->status === 'aprovado' ? 'success' : ($comprovante->status === 'reprovado' ? 'danger' : 'secondary') }}">
                {{ ucfirst($comprovante->status ?? 'pendente') }}
            </span>
        </li>
        <li class="list-group-item"><strong>Arquivo:</strong>
            @if ($comprovante->arquivo)
                <a href="{{ Storage::url($comprovante->arquivo) }}" target="_blank" class="btn btn-link">Ver Arquivo</a>
            @else
                Nenhum arquivo enviado
            @endif
        </li>
    </ul>

    <a href="{{ route('admin.comprovantes.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
