<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use App\Models\Nivel;
use App\Http\Requests\StoreTurmaRequest;
use App\Http\Requests\UpdateTurmaRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TurmaController extends Controller
{
    public function index(): View
    {
        return view('turmas.index', [
            'turmas' => Turma::all(),
            'title' => 'Turmas',
        ]);
    }

    public function create(): View
    {
        return view('turmas.create', [
            'cursos' => Curso::all(),
            'niveis' => Nivel::all(),
        ]);
    }

    public function store(StoreTurmaRequest $request): RedirectResponse
    {
        Turma::create($request->validated());
        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso.');
    }

    public function show(Turma $turma): View
    {
        return view('turmas.show', compact('turma'));
    }

    public function edit(Turma $turma): View
    {
        return view('turmas.edit', [
            'turma' => $turma,
            'cursos' => Curso::all(),
            'niveis' => Nivel::all(),
        ]);
    }

    public function update(UpdateTurmaRequest $request, Turma $turma): RedirectResponse
    {
        $turma->update($request->validated());
        return redirect()->route('turmas.index')->with('success', 'Turma atualizada com sucesso.');
    }

    public function destroy(Turma $turma): RedirectResponse
    {
        $turma->delete();
        return redirect()->route('turmas.index')->with('success', 'Turma excluída com sucesso.');
    }
}
