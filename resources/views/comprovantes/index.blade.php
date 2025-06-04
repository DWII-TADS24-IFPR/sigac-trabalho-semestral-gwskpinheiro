@extends('layouts.app')

@section('title', 'Comprovantes')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Comprovantes</h1>
        <a href="{{ route('admin.comprovantes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Novo Comprovante
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Aluno</th>
                    <th>Status</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($comprovantes as $comprovante)
                    <tr>
                        <td>{{ $comprovante->id }}</td>
                        <td>{{ $comprovante->aluno->nome ?? '-' }}</td>
                        <td>
                            @php
                                $badgeClass = match($comprovante->status) {
                                    'aprovado' => 'success',
                                    'reprovado' => 'danger',
                                    default => 'secondary'
                                };
                            @endphp
                            <span class="badge bg-{{ $badgeClass }} text-capitalize">{{ $comprovante->status ?? 'pendente' }}</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.comprovantes.show', $comprovante) }}" class="btn btn-sm btn-outline-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.comprovantes.edit', $comprovante) }}" class="btn btn-sm btn-outline-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.comprovantes.destroy', $comprovante) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>

                            @if(auth()->user()->is_admin && $comprovante->status === 'pendente')
                                <form action="{{ route('admin.comprovantes.aprovar', $comprovante->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-sm btn-success">Aprovar</button>
                                </form>
                                <form action="{{ route('admin.comprovantes.reprovar', $comprovante->id) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-sm btn-danger">Reprovar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Nenhum comprovante cadastrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
