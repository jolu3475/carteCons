<?php

use App\Models\Regular;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('regulars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('paysId')->unsigned();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->date('dateNais');
            $table->string('lieuNais');
            $table->string('sitMat');
            $table->string('proffession');
            $table->integer('nbEnf');
            $table->string('adr');
            $table->string('tel');
            $table->string('numPass');
            $table->date('expPass');
            $table->date('arrExt');
            $table->string('img');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('paysId')->references('id')->on('pays');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regulars');
    }
};
