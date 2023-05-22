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
        Schema::create('uf_modulo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_modulo')->unsigned();
            $table->integer('id_uf')->unsigned();
            $table->foreign('id_modulo')->references('id_modulo')->on('modulos')->onDelete('cascade');
            $table->foreign('id_uf')->references('id_uf')->on('unidad_formativa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uf_modulo');
    }
};
