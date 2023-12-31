<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfessorIdToMessagesTable extends Migration
{
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            // Certifique-se de que a coluna não existe antes de adicioná-la
            if (!Schema::hasColumn('messages', 'professor_id')) {
                $table->foreignId('professor_id')->constrained('professors')->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            // Remova a chave estrangeira apenas se ela existir
            $table->dropForeign(['professor_id']);
            
            // Remova a coluna apenas se ela existir
            $table->dropColumn('professor_id');
        });
    }
}
