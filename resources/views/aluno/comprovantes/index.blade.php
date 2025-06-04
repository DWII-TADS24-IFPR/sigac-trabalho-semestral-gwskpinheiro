@extends('layouts.app')

@section('title', 'Meus Comprovantes')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Meus Comprovantes Enviados</h1>

    <a href="{{ route('aluno.comprovantes.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Enviar Novo Comprovante
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Arquivo</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($comprovantes as $comprovante)
                <tr>
                    <td>{{ $comprovante->id }}</td>
                    <td>{{ $comprovante->descricao }}</td>
                    <td>
                        <span class="badge bg-{{ $comprovante->status === 'aprovado' ? 'success' : ($comprovante->status === 'reprovado' ? 'danger' : 'secondary') }}">
                            {{ ucfirst($comprovante->status) }}
                        </span>
                    </td>
                    <td>
                        @if($comprovante->arquivo)
                            <a href="{{ Storage::url($comprovante->arquivo) }}" target="_blank" class="btn btn-sm btn-outline-primary">Ver</a>
                        @else
                            <span class="text-muted">Não enviado</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Nenhum comprovante enviado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
