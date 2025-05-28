<?php

namespace App\Http\Controllers;

use App\Models\Comprovante;
use App\Models\Aluno;
use App\Http\Requests\StoreComprovanteRequest;
use App\Http\Requests\UpdateComprovanteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ComprovanteController extends Controller
{
    public function index(): View
    {
        return view('comprovantes.index', [
            'comprovantes' => Comprovante::with('aluno')->get(),
        ]);
    }

    public function create(): View
    {
        return view('comprovantes.create', [
            'alunos' => Aluno::all(),
        ]);
    }

    public function store(StoreComprovanteRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('arquivo')) {
            $data['arquivo'] = $request->file('arquivo')->store('comprovantes');
        }

        Comprovante::create($data);

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante criado com sucesso.');
    }

    public function show(Comprovante $comprovante): View
    {
        return view('comprovantes.show', compact('comprovante'));
    }

    public function edit(Comprovante $comprovante): View
    {
        return view('comprovantes.edit', [
            'comprovante' => $comprovante,
            'alunos' => Aluno::all(),
        ]);
    }

    public function update(UpdateComprovanteRequest $request, Comprovante $comprovante): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('arquivo')) {
            if ($comprovante->arquivo && Storage::exists($comprovante->arquivo)) {
                Storage::delete($comprovante->arquivo);
            }
            $data['arquivo'] = $request->file('arquivo')->store('comprovantes');
        }

        $comprovante->update($data);

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante atualizado com sucesso.');
    }

    public function destroy(Comprovante $comprovante): RedirectResponse
    {
        if ($comprovante->arquivo && Storage::exists($comprovante->arquivo)) {
            Storage::delete($comprovante->arquivo);
        }

        $comprovante->delete();

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante excluído com sucesso.');
    }

    public function aprovar($id)
    {
        $comprovante = Comprovante::findOrFail($id);
        $comprovante->status = 'aprovado';
        $comprovante->save();

        $aluno = $comprovante->aluno;
        $aluno->horas_cumpridas += $comprovante->carga_horaria;
        $aluno->save();

        return redirect()->back()->with('success', 'Comprovante aprovado com sucesso!');
    }

    public function reprovar($id)
    {
        $comprovante = Comprovante::findOrFail($id);
        $comprovante->status = 'reprovado';
        $comprovante->save();

        return redirect()->back()->with('success', 'Comprovante reprovado com sucesso!');
    }
}
