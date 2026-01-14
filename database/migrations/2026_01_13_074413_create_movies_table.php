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
        Schema::create('movies', function (Blueprint $table) {
            $table->id('movieId');
            $table->string('movieName');
            $table->string('ageRequirement');
            $table->time('duration');
            $table->text('description');
            $table->string('image')->nullable();
            $table->dateTime('isDeleted')->nullable();
            $table->foreignId('genreId')->constrained('genres', 'genreId')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
