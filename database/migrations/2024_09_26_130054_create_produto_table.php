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
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 45);
            $table->string('descricao', 60)->nullable();
            $table->string('cod_barras', length: 45)->nullable();
            $table->unsignedBigInteger('unidade_id');
            $table->timestamps();   

            $table->foreign('unidade_id')->references('id')->on('unidade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};
