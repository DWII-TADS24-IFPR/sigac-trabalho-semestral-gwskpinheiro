<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up(): void
    {
        Schema::table('comprovantes', function (Blueprint $table) {
            $table->integer('carga_horaria')->default(0)->after('arquivo');
        });
    }

    public function down(): void
    {
        Schema::table('comprovantes', function (Blueprint $table) {
            $table->dropColumn('carga_horaria');
        });
    }

};
