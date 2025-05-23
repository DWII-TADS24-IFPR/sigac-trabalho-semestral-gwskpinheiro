<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cursos')->insert([
            ['nome' => 'Informática', 'descricao' => 'Curso básico de informática'],
            ['nome' => 'Administração', 'descricao' => 'Curso técnico em administração'],
        ]);
    }
}