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
        Schema::create('kanji', function (Blueprint $table) {
            $table->id();
            $table->string('character');
            $table->integer('strokes');
            $table->string('grade')->nullable();
            $table->integer('frequency')->nullable();
            $table->integer('jlpt_level')->nullable();
            $table->string('meanings');
            $table->string('readings_on');
            $table->string('readings_kun');
            $table->string('radicals')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kanji');
    }
};
