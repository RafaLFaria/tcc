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
        Schema::create('baixa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->double(column: 'quantidade');
            $table->double(column: 'valor');
            $table->dateTime(column: 'data');
            $table->timestamps();
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baixa');
    }
};
