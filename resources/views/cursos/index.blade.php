@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
    <h1>Cursos</h1>
    <a href="{{ route('admin.cursos.create') }}" class="btn btn-primary mb-3">Novo</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->id }}</td>
                <td>{{ $curso->nome ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.cursos.show', $curso) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('admin.cursos.edit', $curso) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('admin.cursos.destroy', $curso) }}" method="POST" class="d-inline">
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
