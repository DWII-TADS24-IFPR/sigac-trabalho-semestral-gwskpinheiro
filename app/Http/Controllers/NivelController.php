<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use App\Http\Requests\StoreNivelRequest;
use App\Http\Requests\UpdateNivelRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NivelController extends Controller
{
    public function index(): View
    {
        return view('niveis.index', [
            'niveis' => Nivel::all(),
            'title' => 'Níveis'
        ]);
    }

    public function create(): View
    {
        return view('niveis.create', [
            'title' => 'Novo Nível'
        ]);
    }

    public function store(StoreNivelRequest $request): RedirectResponse
    {
        Nivel::create($request->validated());
        return redirect()->route('niveis.index')->with('success', 'Nível criado com sucesso.');
    }

    public function show(Nivel $nivel): View
    {
        return view('niveis.show', [
            'nivel' => $nivel,
            'title' => 'Detalhes do Nível'
        ]);
    }

    public function edit(Nivel $nivel): View
    {
        return view('niveis.edit', [
            'nivel' => $nivel,
            'title' => 'Editar Nível'
        ]);
    }

    public function update(UpdateNivelRequest $request, Nivel $nivel): RedirectResponse
    {
        $nivel->update($request->validated());
        return redirect()->route('niveis.index')->with('success', 'Nível atualizado com sucesso.');
    }

    public function destroy(Nivel $nivel): RedirectResponse
    {
        $nivel->delete();
        return redirect()->route('niveis.index')->with('success', 'Nível excluído com sucesso.');
    }
}