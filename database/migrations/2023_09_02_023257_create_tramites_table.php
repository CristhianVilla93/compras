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
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->float('precio');
            $table->unsignedBigInteger('articulo_id')->nullable();
            $table->unsignedBigInteger('compra_id')->nullable();
            $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('set null');
            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tramites');
    }
};
