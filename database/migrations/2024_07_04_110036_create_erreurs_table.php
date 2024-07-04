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
        Schema::create('erreurs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carteId');
            $table->unsignedBigInteger('regularId');
            $table->string('contenu');
            $table->timestamps();

            $table->foreign('carteId')->references('id')->on('cartes');
            $table->foreign('regularId')->references('id')->on('regulars');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('erreurs');
    }
};
