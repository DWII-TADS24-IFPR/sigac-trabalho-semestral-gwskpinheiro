@extends('layouts.app')

@section('title', 'Declarações')

@section('content')
    <h1>Declarações</h1>
    <a href="{{ route('admin.declaracoes.create') }}" class="btn btn-primary mb-3">Nova</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aluno</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($declaracoes as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->aluno->nome ?? '-' }}</td>
                    <td>{{ $item->descricao }}</td>
                    <td>
                        <a href="{{ route('admin.declaracoes.show', $item) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('admin.declaracoes.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.declaracoes.destroy', $item) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
