<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMatterIdToProfessorsTable extends Migration
{
    public function up()
    {
        Schema::table('professors', function (Blueprint $table) {
            $table->foreignId('matter_id')->nullable()->constrained('matters');
        });
    }

    public function down()
    {
        Schema::table('professors', function (Blueprint $table) {
            $table->dropForeign(['matter_id']);
            $table->dropColumn('matter_id');
        });
    }
}
