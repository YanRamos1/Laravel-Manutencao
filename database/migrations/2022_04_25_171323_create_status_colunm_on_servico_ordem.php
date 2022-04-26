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
        //create column on servico_ordem table
        Schema::table('ordem_servicos', function (Blueprint $table) {
            $table->Enum('status', ['aberto', 'fechado', 'cancelado'])->default('aberto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_colunm_on_servico_ordem');
    }
};
