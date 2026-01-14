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
        Schema::create('_movie__genre', function (Blueprint $table) {
            $table->id('MovieGenreId');
            $table->foreignId('genreId')->constrained('genres', 'genreId')->onDelete('cascade');
            $table->foreignId('movieId')->constrained('movies', 'movieId')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_movie__genre');
    }
};
