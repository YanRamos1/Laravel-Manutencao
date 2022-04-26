<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamento_ordem_servico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipamento_id');
            $table->unsignedBigInteger('ordem_servico_id');
            $table->timestamps();

            $table->foreign('equipamento_id')->references('id')->on('equipamentos');
            $table->foreign('ordem_servico_id')->references('id')->on('ordem_servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamento_ordem_servico');
        Schema::table('equipamento_ordem_servico', function (Blueprint $table) {
            $table->dropForeign(['equipamento_id']);
            $table->dropForeign(['ordem_servico_id']);
        });

    }
};
