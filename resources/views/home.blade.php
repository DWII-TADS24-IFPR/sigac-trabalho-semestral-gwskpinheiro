@extends('layouts.app')

@section('title', 'SIGAC - Dashboard')

@section('content')

    <div class="row g-4 justify-content-center">
        @php
            $cards = [
                ['label' => 'Alunos', 'count' => $alunos, 'route' => 'alunos.index', 'icon' => 'fa-user-graduate', 'desc' => 'Gerencie os alunos matriculados.'],
                ['label' => 'Turmas', 'count' => $turmas, 'route' => 'turmas.index', 'icon' => 'fa-users', 'desc' => 'Organize e visualize as turmas.'],
                ['label' => 'Cursos', 'count' => $cursos, 'route' => 'cursos.index', 'icon' => 'fa-book-open', 'desc' => 'Cadastre os cursos disponíveis.'],
                ['label' => 'Níveis', 'count' => $niveis, 'route' => 'niveis.index', 'icon' => 'fa-layer-group', 'desc' => 'Classifique os cursos por nível.'],
                ['label' => 'Categorias', 'count' => $categorias, 'route' => 'categorias.index', 'icon' => 'fa-tags', 'desc' => 'Categorias de documentos ou cursos.'],
                ['label' => 'Comprovantes', 'count' => $comprovantes, 'route' => 'comprovantes.index', 'icon' => 'fa-file-invoice', 'desc' => 'Arquivos de comprovação.'],
                ['label' => 'Declarações', 'count' => $declaracoes, 'route' => 'declaracoes.index', 'icon' => 'fa-file-signature', 'desc' => 'Documentos emitidos para os alunos.'],
                ['label' => 'Documentos', 'count' => $documentos, 'route' => 'documentos.index', 'icon' => 'fa-folder-open', 'desc' => 'Gerencie os documentos anexos.'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="col-md-6 col-xl-4">
                <div class="card text-white bg-primary h-100 shadow rounded p-3">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3">
                            <h5 class="card-title fw-bold">
                                <i class="fas {{ $card['icon'] }} me-2"></i> {{ $card['label'] }}
                            </h5>
                            <h3 class="card-text">{{ $card['count'] }}</h3>
                            <p class="small">{{ $card['desc'] }}</p>
                        </div>
                        <a href="{{ route($card['route']) }}" class="btn btn-light mt-auto">Gerenciar {{ strtolower($card['label']) }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
