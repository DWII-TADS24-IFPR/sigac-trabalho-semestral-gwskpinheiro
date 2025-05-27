<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Aluno\HomeController as AlunoHomeController;

// Redireciona a raiz para o login
Route::get('/', fn () => redirect('/login'));

// Redirecionamento pós login com base no perfil
Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->is_admin) {
        return redirect()->route('admin.home');
    } elseif (Auth::check()) {
        return redirect()->route('aluno.home');
    }
    return redirect('/login');
})->middleware(['auth'])->name('dashboard');

// Rotas para ambos autenticados, mas separando a home
Route::middleware(['auth'])->group(function () {
    // Home do Admin
    Route::get('/admin/home', function () {
        if (!auth()->user()->is_admin) {
            return redirect('/');
        }
        return app(AdminHomeController::class)->index();
    })->name('admin.home');

    // Home do Aluno
    Route::get('/aluno/home', function () {
        if (auth()->user()->is_admin) {
            return redirect('/');
        }
        return app(AlunoHomeController::class)->index();
    })->name('aluno.home');
});

// CRUDs acessíveis apenas para administradores
Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => function ($request, $next) {
        if (!auth()->user()->is_admin) {
            return redirect('/');
        }
        return $next($request);
    }], function () {
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

        // Aprovação/Reprovação de Comprovantes
        Route::patch('/comprovantes/{id}/aprovar', [ComprovanteController::class, 'aprovar'])->name('comprovantes.aprovar');
        Route::patch('/comprovantes/{id}/reprovar', [ComprovanteController::class, 'reprovar'])->name('comprovantes.reprovar');
    });
});

// Perfil do usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autenticação (Breeze)
require __DIR__.'/auth.php';
