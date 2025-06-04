@extends('layouts.app')

@section('title', 'Turmas')

@section('content')
    <h1>Turmas</h1>

    <a href="{{ route('admin.turmas.create') }}" class="btn btn-primary mb-3">Nova</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Curso</th>
                <th>Nível</th>
                <th>Ano</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($turmas as $turma)
                <tr>
                    <td>{{ $turma->id }}</td>
                    <td>{{ $turma->nome ?? '-' }}</td>
                    <td>{{ $turma->curso->nome ?? '-' }}</td>
                    <td>{{ $turma->nivel->nome ?? '-' }}</td>
                    <td>{{ $turma->ano }}</td>
                    <td>
                        <a href="{{ route('admin.turmas.show', $turma) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('admin.turmas.edit', $turma) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.turmas.destroy', $turma) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Nenhuma turma cadastrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
