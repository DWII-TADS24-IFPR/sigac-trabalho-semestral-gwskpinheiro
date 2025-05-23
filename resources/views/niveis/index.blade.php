@extends('layouts.app')

@section('title', ucfirst($title))

@section('content')
    <h1>{{ ucfirst($title) }}</h1>

    <a href="{{ route('niveis.create') }}" class="btn btn-primary mb-3">Novo</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($niveis as $nivel)
            <tr>
                <td>{{ $nivel->id }}</td>
                <td>{{ $nivel->nome ?? '-' }}</td>
                <td>
                    <a href="{{ route('niveis.show', $nivel) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('niveis.edit', $nivel) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('niveis.destroy', $nivel) }}" method="POST" class="d-inline">
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