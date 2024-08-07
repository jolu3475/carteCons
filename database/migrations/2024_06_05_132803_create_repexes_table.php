<?php

use App\Models\Repex;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('repexes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('paysId')->unsigned();
            $table->string('label')->uniaue();
            $table->string('adr');
            $table->string('email');
            $table->string('site')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('paysId')->references('id')->on('pays');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repexes');
    }
};
