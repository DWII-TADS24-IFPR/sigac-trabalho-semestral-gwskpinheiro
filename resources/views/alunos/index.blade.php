@extends('layouts.app')

@section('title', 'Alunos')

@section('content')
    <h1>Lista de Alunos</h1>

    <a href="{{ route('admin.alunos.create') }}" class="btn btn-primary mb-3">Novo</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($alunos as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nome ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.alunos.show', $item) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('admin.alunos.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('admin.alunos.destroy', $item) }}" method="POST" class="d-inline">
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
