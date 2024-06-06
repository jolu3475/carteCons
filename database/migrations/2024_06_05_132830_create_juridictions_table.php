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
            $table->string('codePays');
            $table->timestamps();

            $table->foreign('repexId')->references('id')->on('repexes');
            $table->foreign('codePays')->references('code')->on('pays');
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
