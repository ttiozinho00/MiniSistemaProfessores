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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Adiciona a coluna user_id
            $table->string('student_name');
            $table->date('birth_date');
            $table->string('city');
            $table->string('state');
            $table->string('email');
            $table->string('whatsapp');
            $table->enum('status', ['pendente', 'respondido'])->default('pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
