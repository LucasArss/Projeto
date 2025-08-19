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
        Schema::table('users', function (Blueprint $table) {
            $table->string('bairro')->nullable();
            $table->string('rua')->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->string('horario_funcionamento')->nullable();
            $table->string('contato')->nullable();
            $table->string('produtos_oferecidos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['bairro', 'rua', 'forma_pagamento', 'horario_funcionamento', 'contato', 'produtos_oferecidos']);
        });
    }
};
