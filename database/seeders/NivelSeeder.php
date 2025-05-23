<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('niveis')->insert([
            ['nome' => 'Básico'],
            ['nome' => 'Intermediário'],
            ['nome' => 'Avançado'],
        ]);
    }
}