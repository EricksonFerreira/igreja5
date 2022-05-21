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
        Schema::create('presenca_cultos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('membro_id');
            $table->foreign('membro_id')->references('id')->on('membros');

            $table->unsignedBigInteger('culto_id');
            $table->foreign('culto_id')->references('id')->on('cultos');

            $table->boolean('compareceu');
            $table->boolean('ativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cultos');
        Schema::dropIfExists('membros');
        Schema::dropIfExists('presenca_cultos');
    }
};
