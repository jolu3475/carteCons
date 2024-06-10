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
        Schema::create('cartes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('captchaId')->unsigned();
            $table->bigInteger('regularId')->unsigned();
            $table->string('numero')->unique();
            $table->date('dateRemise');
            $table->date('dateExpiration');
            $table->timestamps();

            $table->foreign('regularId')->references('id')->on('regulars');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartes');
    }
};
