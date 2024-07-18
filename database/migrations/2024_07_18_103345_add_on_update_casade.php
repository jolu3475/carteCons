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
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropForeign(['userid']);
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('regulars', function (Blueprint $table) {
            $table->dropForeign(['codePays']);
            $table->foreign('codePays')->references('code')->on('pays')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('cartes', function (Blueprint $table) {
            $table->dropForeign(['regularId']);
            $table->foreign('regularId')->references('id')->on('regulars')->onDelete('cascade')->onUpdate('cascade');
            $table->dropForeign(['captchaId']);
            $table->foreign('captchaId')->references('id')->on('captchas')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('repexes', function (Blueprint $table) {
            $table->dropForeign(['codePays']);
            $table->foreign('codePays')->references('code')->on('pays')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('juridictions', function (Blueprint $table) {
            $table->dropForeign(['repexId']);
            $table->foreign('repexId')->references('id')->on('repexes')->onDelete('cascade')->onUpdate('cascade');
            $table->dropForeign(['codePays']);
            $table->foreign('codePays')->references('code')->on('pays')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('erreurs', function (Blueprint $table) {
            $table->dropForeign(['carteId']);
            $table->foreign('carteId')->references('id')->on('cartes')->onDelete('cascade')->onUpdate('cascade');
            $table->dropForeign(['regularId']);
            $table->foreign('regularId')->references('id')->on('regulars')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['repex_id']);
            $table->foreign('repex_id')->references('id')->on('repexes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropForeign(['userid']);
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('regulars', function (Blueprint $table) {
            $table->dropForeign(['codePays']);
            $table->foreign('codePays')->references('code')->on('pays');
        });
        Schema::table('cartes', function (Blueprint $table) {
            $table->dropForeign(['regularId']);
            $table->foreign('regularId')->references('id')->on('regulars');
            $table->dropForeign(['captchaId']);
            $table->foreign('captchaId')->references('id')->on('captchas');
        });
        Schema::table('repexes', function (Blueprint $table) {
            $table->dropForeign(['codePays']);
            $table->foreign('codePays')->references('code')->on('pays');
        });
        Schema::table('juridictions', function (Blueprint $table) {
            $table->dropForeign(['repexId']);
            $table->foreign('repexId')->references('id')->on('repexes');
            $table->dropForeign(['codePays']);
            $table->foreign('codePays')->references('code')->on('pays');
        });
        Schema::table('erreurs', function (Blueprint $table) {
            $table->dropForeign(['carteId']);
            $table->foreign('carteId')->references('id')->on('cartes');
            $table->dropForeign(['regularId']);
            $table->foreign('regularId')->references('id')->on('regulars');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['repex_id']);
            $table->foreign('repex_id')->references('id')->on('repexes');
        });
    }
};
