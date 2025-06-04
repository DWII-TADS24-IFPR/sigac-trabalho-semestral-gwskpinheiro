@extends('layouts.app')

@section('title', 'Documentos')

@section('content')
    <h1>Documentos</h1>
    <a href="{{ route('admin.documentos.create') }}" class="btn btn-primary mb-3">Novo Documento</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aluno</th>
                <th>Categoria</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documentos as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->aluno->nome ?? '-' }}</td>
                    <td>{{ $item->categoria->nome ?? '-' }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>
                        <a href="{{ route('admin.documentos.show', $item) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('admin.documentos.edit', $item) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.documentos.destroy', $item) }}" method="POST" class="d-inline">
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
