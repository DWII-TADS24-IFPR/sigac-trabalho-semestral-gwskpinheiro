<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Aluno;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentoRequest;
use App\Http\Requests\UpdateDocumentoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DocumentoController extends Controller
{
    public function index(): View
    {
        return view('documentos.index', [
            'documentos' => Documento::with(['aluno', 'categoria'])->get()
        ]);
    }

    public function create(): View
    {
        return view('documentos.create', [
            'alunos' => Aluno::all(),
            'categorias' => Categoria::all(),
        ]);
    }

    public function store(StoreDocumentoRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('arquivo')) {
            $data['arquivo'] = $request->file('arquivo')->store('documentos');
        }

        Documento::create($data);

        return redirect()->route('documentos.index')->with('success', 'Documento criado com sucesso.');
    }

    public function show(Documento $documento): View
    {
        return view('documentos.show', compact('documento'));
    }

    public function edit(Documento $documento): View
    {
        return view('documentos.edit', [
            'documento' => $documento,
            'alunos' => Aluno::all(),
            'categorias' => Categoria::all(),
        ]);
    }

    public function update(UpdateDocumentoRequest $request, Documento $documento): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('arquivo')) {
            if ($documento->arquivo) {
                Storage::delete($documento->arquivo);
            }
            $data['arquivo'] = $request->file('arquivo')->store('documentos');
        }

        $documento->update($data);

        return redirect()->route('documentos.index')->with('success', 'Documento atualizado com sucesso.');
    }

    public function destroy(Documento $documento): RedirectResponse
    {
        if ($documento->arquivo) {
            Storage::delete($documento->arquivo);
        }

        $documento->delete();

        return redirect()->route('documentos.index')->with('success', 'Documento excluído com sucesso.');
    }
}
