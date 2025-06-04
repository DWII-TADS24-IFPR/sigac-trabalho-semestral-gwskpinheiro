@extends('layouts.app')

@section('title', 'Editar Comprovante')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Comprovante</h1>

    <form action="{{ route('admin.comprovantes.update', $comprovante) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ old('descricao', $comprovante->descricao) }}">
            @error('descricao') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" id="aluno_id" class="form-select">
                <option value="">Selecione o aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ old('aluno_id', $comprovante->aluno_id) == $aluno->id ? 'selected' : '' }}>
                        {{ $aluno->nome }}
                    </option>
                @endforeach
            </select>
            @error('aluno_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo</label>
            <input type="file" name="arquivo" id="arquivo" class="form-control">
            @if ($comprovante->arquivo)
                <small class="d-block mt-2">
                    Arquivo atual: <a href="{{ Storage::url($comprovante->arquivo) }}" target="_blank">Visualizar</a>
                </small>
            @endif
            @error('arquivo') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('admin.comprovantes.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>
@endsection
