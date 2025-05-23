<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CursoController extends Controller
{
    public function index(): View
    {
        return view('cursos.index', [
            'cursos' => Curso::all(),
            'title' => 'Cursos',
        ]);
    }

    public function create(): View
    {
        return view('cursos.create');
    }

    public function store(StoreCursoRequest $request): RedirectResponse
    {
        Curso::create($request->validated());
        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso.');
    }

    public function show(Curso $curso): View
    {
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso): View
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(UpdateCursoRequest $request, Curso $curso): RedirectResponse
    {
        $curso->update($request->validated());
        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso.');
    }

    public function destroy(Curso $curso): RedirectResponse
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso excluído com sucesso.');
    }
}
