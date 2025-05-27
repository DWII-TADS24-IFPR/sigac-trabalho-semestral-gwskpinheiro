<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use Illuminate\Http\Request;

class GraficoController extends Controller
{
    public function index(Request $request)
    {
        $turmas = Turma::with('alunos')->get(); // Agora com alunos

        $graficoData = null;

        if ($request->filled('turma_id')) {
            $turma = $turmas->firstWhere('id', $request->turma_id);

            if ($turma) {
                $labels = $turma->alunos->pluck('nome');
                $horas = $turma->alunos->pluck('horas_cumpridas');

                $graficoData = [
                    'labels' => $labels,
                    'horas' => $horas,
                ];
            }
        }

        return view('admin.graficos.index', compact('turmas', 'graficoData'));
    }
}
