@extends('layouts.app')

@section('title', 'Comprovantes')

@section('content')
    <h1>Comprovantes</h1>
    <a href="{{ route('comprovantes.create') }}" class="btn btn-primary mb-3">Novo</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comprovantes as $comprovante)
            <tr>
                <td>{{ $comprovante->id }}</td>
                <td>{{ $comprovante->nome ?? '-' }}</td>
                <td>
                    <a href="{{ route('comprovantes.show', $comprovante) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('comprovantes.edit', $comprovante) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('comprovantes.destroy', $comprovante) }}" method="POST" class="d-inline">
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
