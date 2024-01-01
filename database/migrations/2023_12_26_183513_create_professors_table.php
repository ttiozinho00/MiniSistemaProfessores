<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorsTable extends Migration
{
    /**
     * Execute as migrações.
     *
     * @return void
     */
    public function up(): void
    {
        // Verifica se a tabela 'professors' não existe antes de criar
        if (!Schema::hasTable('professors')) {
            Schema::create('professors', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverta as migrações.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('professors');
    }
}
