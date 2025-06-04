@extends('layouts.app')

@section('title', 'Detalhes do Aluno')

@section('content')
    <h1>Detalhes do Aluno</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Nome:</strong> {{ $aluno->nome }}</li>
        <li class="list-group-item"><strong>Matrícula:</strong> {{ $aluno->matricula }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $aluno->email }}</li>
        <li class="list-group-item"><strong>Data de Nascimento:</strong> {{ $aluno->data_nascimento->format('d/m/Y') }}</li>
        <li class="list-group-item"><strong>CPF:</strong> {{ $aluno->cpf }}</li>
    </ul>

    <a href="{{ route('admin.alunos.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('admin.alunos.edit', $aluno) }}" class="btn btn-warning">Editar</a>
@endsection
