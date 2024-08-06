<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('juridictions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repexId');
            $table->bigInteger('paysId')->unsigned();
            $table->timestamps();

            $table->foreign('repexId')->references('id')->on('repexes');
            $table->foreign('paysId')->references('id')->on('pays');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juridictions');
    }
};
