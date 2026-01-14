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
        Schema::create('plays', function (Blueprint $table) {
            $table->id('playId');
            $table->dateTime('when');
            $table->foreignId('movieId')->constrained('movies', 'movieId')->onDelete('cascade');
            $table->foreignId('hallId')->constrained('halls', 'hallId')->onDelete('cascade');
            $table->foreignId('cinemaId')->constrained('cinemas', 'cinemaId')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plays');
    }
};
