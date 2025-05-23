<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\DocumentoController;
use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Curso;
use App\Models\Nivel;
use App\Models\Categoria;
use App\Models\Comprovante;
use App\Models\Declaracao;
use App\Models\Documento;

Route::get('/', function () {
    return view('home', [
        'alunos' => Aluno::count(),
        'turmas' => Turma::count(),
        'cursos' => Curso::count(),
        'niveis' => Nivel::count(),
        'categorias' => Categoria::count(),
        'comprovantes' => Comprovante::count(),
        'declaracoes' => Declaracao::count(),
        'documentos' => Documento::count(),
    ]);
});

Route::resources([
    'alunos' => AlunoController::class,
    'categorias' => CategoriaController::class,
    'cursos' => CursoController::class,
    'niveis' => NivelController::class,
    'turmas' => TurmaController::class,
    'comprovantes' => ComprovanteController::class,
    'declaracoes' => DeclaracaoController::class,
    'documentos' => DocumentoController::class,
]);