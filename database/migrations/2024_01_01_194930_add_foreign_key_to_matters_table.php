<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToMattersTable extends Migration
{
    public function up()
    {
        Schema::table('matters', function (Blueprint $table) {
            // Remova a restrição de chave estrangeira existente
            $table->dropForeign('matters_professor_id_foreign');

            // Adicione a nova restrição de chave estrangeira com ON DELETE CASCADE
            $table->foreign('professor_id')->references('id')->on('professors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('matters', function (Blueprint $table) {
            // Remova a restrição de chave estrangeira com ON DELETE CASCADE
            $table->dropForeign('matters_professor_id_foreign');

            // Adicione a restrição de chave estrangeira anterior (se necessário)
            $table->foreign('professor_id')->references('id')->on('professors');
        });
    }
}

