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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuário que deu o like
            $table->foreignId('comerciante_id')->constrained('users')->onDelete('cascade'); // Comerciante que recebeu o like
            $table->timestamps();
            $table->boolean('liked'); // Indica se é um like (true) ou dislike (false)
            $table->unique(['user_id', 'comerciante_id']); // Garante que um usuário só possa dar like/dislike uma vez por comerciante
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
