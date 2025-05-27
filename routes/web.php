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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->is_admin) {
        return redirect()->route('admin.home');
    } elseif (Auth::check()) {
        return redirect()->route('aluno.home');
    }
    return redirect('/login');
})->middleware(['auth'])->name('dashboard');

// ROTA HOME ADMIN
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', function () {
        if (!auth()->user()->is_admin) {
            return redirect('/');
        }
        return app(AdminHomeController::class)->index();
    })->name('admin.home');

    Route::get('/aluno/home', function () {
        if (auth()->user()->is_admin) {
            return redirect('/');
        }
        return app(AlunoHomeController::class)->index();
    })->name('aluno.home');
});

// ROTAS CRUD APENAS PARA ADM
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
    });
});

// PERFIL
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
