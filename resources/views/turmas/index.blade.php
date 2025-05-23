@extends('layouts.app')

@section('title', ucfirst($title))

@section('content')
    <h1>{{ ucfirst($title) }}</h1>
    <a href="{{ route('turmas.create') }}" class="btn btn-primary mb-3">Novo</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($turmas as $turma)
            <tr>
                <td>{{ $turma->id }}</td>
                <td>{{ $turma->nome ?? '-' }}</td>
                <td>
                    <a href="{{ route('turmas.show', $turma) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('turmas.edit', $turma) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('turmas.destroy', $turma) }}" method="POST" class="d-inline">
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