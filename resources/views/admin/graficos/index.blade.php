@extends('layouts.app')

@section('title', 'Gráficos de Horas por Turma')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center text-primary fw-bold">
        <i class="fas fa-chart-bar me-2"></i> Horas Complementares por Aluno (por Turma)
    </h1>

    <!-- Formulário de seleção de turma -->
    <form action="{{ route('admin.graficos') }}" method="GET" class="mb-4">
        <div class="row justify-content-center g-2 align-items-end">
            <div class="col-md-6">
                <label for="turma_id" class="form-label fw-semibold">Selecione a Turma:</label>
                <select name="turma_id" id="turma_id" class="form-select shadow-sm" onchange="this.form.submit()">
                    <option value="">-- Escolha a turma --</option>
                    @foreach($turmas as $turma)
                        <option value="{{ $turma->id }}" {{ request('turma_id') == $turma->id ? 'selected' : '' }}>
                            {{ $turma->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

    <!-- Gráfico ou mensagem -->
    @if(isset($graficoData) && count($graficoData['labels']))
        <div class="card shadow-sm p-4 mt-4">
            <h5 class="text-center mb-3 text-secondary">Distribuição de Horas Aprovadas</h5>
            <canvas id="graficoHoras" height="120"></canvas>
        </div>
    @elseif(request()->has('turma_id'))
        <div class="alert alert-warning mt-4 text-center">
            <i class="fas fa-exclamation-circle me-2"></i>
            Nenhum comprovante aprovado encontrado para esta turma.
        </div>
    @endif
</div>
@endsection

@push('scripts')
@if(isset($graficoData) && count($graficoData['labels']))
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('graficoHoras').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($graficoData['labels']) !!},
                datasets: [{
                    label: 'Horas Aprovadas',
                    data: {!! json_encode($graficoData['horas']) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Horas',
                            font: { weight: 'bold' }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Aluno',
                            font: { weight: 'bold' }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: context => context.parsed.y + ' hora(s)'
                        }
                    }
                }
            }
        });
    </script>
@endif
@endpush
