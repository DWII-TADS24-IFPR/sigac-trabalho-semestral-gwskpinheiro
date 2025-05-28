<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Aluno;
use App\Models\Comprovante;
use Illuminate\Support\Facades\Storage;

class ComprovanteAlunoController extends Controller
{
    public function index()
    {
        $aluno = Aluno::where('email', Auth::user()->email)->firstOrFail();
        $comprovantes = $aluno->comprovantes()->latest()->get();

        return view('aluno.comprovantes.index', compact('comprovantes'));
    }

    public function create()
    {
        return view('aluno.comprovantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'carga_horaria' => 'required|numeric|min:1',
            'arquivo' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $aluno = Aluno::where('email', Auth::user()->email)->firstOrFail();

        $comprovante = new Comprovante();
        $comprovante->descricao = $request->descricao;
        $comprovante->aluno_id = $aluno->id;
        $comprovante->carga_horaria = $request->carga_horaria;
        $comprovante->status = 'pendente';

        if ($request->hasFile('arquivo')) {
            $comprovante->arquivo = $request->file('arquivo')->store('comprovantes', 'public');
        }

        $comprovante->save();

        return redirect()->route('aluno.comprovantes.index')
                         ->with('success', 'Comprovante enviado com sucesso!');
    }
}
