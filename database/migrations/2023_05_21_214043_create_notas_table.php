<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id_nota');
            $table->integer('id_user')->unsigned();
            $table->integer('id_modulo')->unsigned();
            $table->integer('id_uf')->unsigned();
            $table->integer('nota');

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_modulo')->references('id_modulo')->on('modulos')->onDelete('cascade');
            $table->foreign('id_uf')->references('id_uf')->on('unidad_formativa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas');
    }
};
