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
        Schema::create('itemcompra', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('compra_id');
            $table->double(column: 'quantidade');
            $table->double(column: 'valor');
            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
