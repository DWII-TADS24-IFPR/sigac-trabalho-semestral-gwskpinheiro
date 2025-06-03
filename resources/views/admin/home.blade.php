@extends('layouts.app')

@section('title', 'Painel do Administrador')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-white bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user-graduate fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-0">Alunos</h5>
                            <small>{{ \App\Models\Aluno::count() }} matriculados</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-white bg-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-users fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-0">Turmas</h5>
                            <small>{{ \App\Models\Turma::count() }} registradas</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-white bg-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-file-invoice fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-0">Comprovantes</h5>
                            <small>{{ \App\Models\Comprovante::count() }} enviados</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-white bg-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-chart-bar fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-0">Declarações</h5>
                            <small>{{ \App\Models\Declaracao::count() }} emitidas</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-3">Gestão</h4>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @php
            $cards = [
                ['label' => 'Alunos', 'route' => 'admin.alunos.index', 'icon' => 'fa-user-graduate', 'desc' => 'Gerencie os alunos matriculados.'],
                ['label' => 'Turmas', 'route' => 'admin.turmas.index', 'icon' => 'fa-users', 'desc' => 'Visualize e organize as turmas.'],
                ['label' => 'Cursos', 'route' => 'admin.cursos.index', 'icon' => 'fa-book-open', 'desc' => 'Cadastre cursos e conteúdos.'],
                ['label' => 'Níveis', 'route' => 'admin.niveis.index', 'icon' => 'fa-layer-group', 'desc' => 'Classifique os cursos.'],
                ['label' => 'Categorias', 'route' => 'admin.categorias.index', 'icon' => 'fa-tags', 'desc' => 'Documentos ou cursos.'],
                ['label' => 'Comprovantes', 'route' => 'admin.comprovantes.index', 'icon' => 'fa-file-alt', 'desc' => 'Arquivos comprobatórios.'],
                ['label' => 'Declarações', 'route' => 'admin.declaracoes.index', 'icon' => 'fa-file-signature', 'desc' => 'Documentos para alunos.'],
                ['label' => 'Documentos', 'route' => 'admin.documentos.index', 'icon' => 'fa-folder-open', 'desc' => 'Gerencie os anexos.'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="col">
                <div class="card h-100 border border-primary shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas {{ $card['icon'] }} fa-lg text-primary me-2"></i>
                            <h5 class="card-title mb-0 text-primary">{{ $card['label'] }}</h5>
                        </div>
                        <p class="card-text text-muted small">{{ $card['desc'] }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-end">
                        <a href="{{ route($card['route']) }}" class="btn btn-outline-primary btn-sm">Gerenciar {{ strtolower($card['label']) }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
