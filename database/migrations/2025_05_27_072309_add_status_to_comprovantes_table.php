<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('comprovantes', function (Blueprint $table) {
            $table->enum('status', ['pendente', 'aprovado', 'reprovado'])->default('pendente');
        });
    }

    public function down()
    {
        Schema::table('comprovantes', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }

};
