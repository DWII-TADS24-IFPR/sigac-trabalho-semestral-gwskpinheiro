@extends('layouts.app')

@section('title', 'SIGAC - Área do Aluno')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Bem-vindo(a), {{ Auth::user()->name }}</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><i class="fas fa-file-upload me-2"></i> Enviar Comprovante</h5>
                        <p class="card-text">Submeta arquivos que comprovem atividades complementares.</p>
                        <a href="{{ route('aluno.comprovantes.create') }}" class="btn btn-primary mt-auto">Enviar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><i class="fas fa-check-circle me-2"></i> Solicitar Horas</h5>
                        <p class="card-text">Veja e solicite aprovação de suas atividades complementares.</p>
                        <a href="{{ route('aluno.comprovantes.index') }}" class="btn btn-primary mt-auto">Visualizar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><i class="fas fa-file-alt me-2"></i> Gerar Declaração</h5>
                        <p class="card-text">Emita uma declaração de cumprimento de horas.</p>
                        <a href="#" class="btn btn-primary mt-auto disabled" title="Em breve">Gerar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
