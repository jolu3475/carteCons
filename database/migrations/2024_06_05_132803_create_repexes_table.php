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
            $table->string('codePays');
            $table->string('label')->uniaue();
            $table->string('adr');
            $table->string('email');
            $table->timestamps();

            $table->foreign('codePays')->references('code')->on('pays');
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
