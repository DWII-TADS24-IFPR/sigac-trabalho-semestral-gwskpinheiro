@extends('layouts.app')

@section('title', 'Níveis')

@section('content')
    <h1>Níveis</h1>

    <a href="{{ route('admin.niveis.create') }}" class="btn btn-primary mb-3">Novo</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($niveis as $nivel)
                <tr>
                    <td>{{ $nivel->id }}</td>
                    <td>{{ $nivel->nome ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.niveis.show', $nivel) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('admin.niveis.edit', $nivel) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.niveis.destroy', $nivel) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">Nenhum nível cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
