<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AlunoController extends Controller
{
    public function index(): View
    {
        return view('alunos.index', ['alunos' => Aluno::all()]);
    }

    public function create(): View
    {
        return view('alunos.create');
    }

    public function store(StoreAlunoRequest $request): RedirectResponse
    {
        Aluno::create($request->validated());
        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso.');
    }

    public function show(Aluno $aluno): View
    {
        return view('alunos.show', compact('aluno'));
    }

    public function edit(Aluno $aluno): View
    {
        return view('alunos.edit', compact('aluno'));
    }

    public function update(UpdateAlunoRequest $request, Aluno $aluno): RedirectResponse
    {
        $aluno->update($request->validated());
        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso.');
    }

    public function destroy(Aluno $aluno): RedirectResponse
    {
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso.');
    }
}
