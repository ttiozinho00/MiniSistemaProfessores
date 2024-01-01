<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // Migração para a tabela `matters`
public function up()
{
    Schema::create('matters', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->unsignedBigInteger('professor_id');
        $table->foreign('professor_id')->references('id')->on('professors');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matters');
    }
};
