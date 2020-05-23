<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableOrdemServicosTempo extends Migration
{

    public function up()
    {
        Schema::table('ordem_servicos', function (Blueprint $table) {
            $table->string('duracao')->nullable();
            $table->string('espera')->nullable();
        });
    }


    public function down()
    {
        Schema::table('ordem_servicos', function (Blueprint $table) {
            $table->dropColumn('duracao');
            $table->dropColumn('espera');
        });
    }
}
