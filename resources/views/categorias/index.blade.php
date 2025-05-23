@extends('layouts.app')

@section('title', ucfirst($title))

@section('content')
    <h1>{{ ucfirst($title) }}</h1>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Novo</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nome ?? '-' }}</td>
                <td>
                    <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="d-inline">
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
