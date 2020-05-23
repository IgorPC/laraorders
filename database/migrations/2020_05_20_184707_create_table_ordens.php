<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('servico_id');
            $table->unsignedBigInteger('status');
            $table->text('motivo');
            $table->unsignedBigInteger('user_create');
            $table->unsignedBigInteger('user_open')->nullable();
            $table->timestamp('data_open')->nullable();
            $table->unsignedBigInteger('user_closed')->nullable();
            $table->timestamp('data_closed')->nullable();
            $table->text('observacoes');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('servico_id')->references('id')->on('servicos');
            $table->foreign('user_create')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordens');
    }
}
