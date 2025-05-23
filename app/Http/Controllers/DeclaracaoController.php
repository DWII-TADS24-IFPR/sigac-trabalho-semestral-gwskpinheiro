<?php

namespace App\Http\Controllers;

use App\Models\Declaracao;
use App\Http\Requests\StoreDeclaracaoRequest;
use App\Http\Requests\UpdateDeclaracaoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DeclaracaoController extends Controller
{

    

    public function index(): View
    {
        return view('declaracoes.index', ['declaracoes' => Declaracao::all()]);
    }

    public function create(): View
    {
        return view('declaracoes.create', [
        'alunos' => \App\Models\Aluno::all()
    ]);
    }

    public function store(StoreDeclaracaoRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('arquivo')) {
            $data['arquivo'] = $request->file('arquivo')->store('declaracoes');
        }

        \App\Models\Declaracao::create($data);

        return redirect()->route('declaracoes.index')->with('success', 'Declaração criada com sucesso.');
    }

        public function show(Declaracao $declaracao): View
    {
        return view('declaracoes.show', ['declaracao' => $declaracao]);
    }

        public function edit(Declaracao $declaracao): View
    {
        return view('declaracoes.edit', [
            'declaracao' => $declaracao,
            'alunos' => \App\Models\Aluno::all()
        ]);
    }

    public function update(UpdateDeclaracaoRequest $request, Declaracao $declaracao): RedirectResponse
    {
        $declaracao->update($request->validated());
        return redirect()->route('declaracoes.index')->with('success', 'Declaração atualizada com sucesso.');
    }

    public function destroy(Declaracao $declaracao): RedirectResponse
    {
        $declaracao->delete();
        return redirect()->route('declaracoes.index')->with('success', 'Declaração excluída com sucesso.');
    }
}
