<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveProfessorIdFromMessagesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Verifica se a coluna e a chave estrangeira existem antes de removê-las
        if (Schema::hasColumn('messages', 'professor_id') && Schema::hasForeignKey('messages', 'messages_professor_id_foreign')) {
            Schema::table('messages', function (Blueprint $table) {
                $table->dropForeign(['professor_id']);
                $table->dropColumn('professor_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Adicione a coluna e a chave estrangeira novamente se precisar reverter
        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('professor_id')->constrained('professors')->onUpdate('cascade')->onDelete('cascade');
        });
    }
}
