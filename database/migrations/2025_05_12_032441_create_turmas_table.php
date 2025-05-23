<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->foreignId('curso_id')->constrained()->onDelete('cascade');
            $table->foreignId('nivel_id')->constrained('niveis')->onDelete('cascade'); 
            $table->integer('ano');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('aluno_turma');
        Schema::dropIfExists('turmas');
    }
};
