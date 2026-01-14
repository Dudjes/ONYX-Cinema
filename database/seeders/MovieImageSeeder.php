<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MovieImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure the public disk directory exists
        Storage::disk('public')->makeDirectory('movies');

        Movie::whereNull('image')->orWhere('image', '')->get()->each(function ($movie) {
            $title = $movie->movieName ?? 'Movie';
            $safeTitle = preg_replace('/[^A-Za-z0-9\-]/', '-', strtolower($title));
            $filename = "movies/{$movie->movieId}-{$safeTitle}.svg";

            $svg = $this->generateSvgPlaceholder($movie->movieName, $movie->ageRequirement ?? '');

            Storage::disk('public')->put($filename, $svg);

            $movie->image = $filename;
            $movie->save();
        });
    }

    protected function generateSvgPlaceholder(string $title = 'Movie', string $age = ''): string
    {
        $escapedTitle = htmlspecialchars($title, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $escapedAge = htmlspecialchars($age, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

        $svg = <<<SVG
<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" width="800" height="1200" viewBox="0 0 800 1200">
  <defs>
    <linearGradient id="g" x1="0" x2="1" y1="0" y2="1">
      <stop offset="0%" stop-color="#333" />
      <stop offset="100%" stop-color="#555" />
    </linearGradient>
  </defs>
  <rect width="100%" height="100%" fill="url(#g)" />
  <text x="50%" y="45%" font-family="Arial, Helvetica, sans-serif" font-size="36" fill="#d4af37" text-anchor="middle">🎬</text>
  <text x="50%" y="55%" font-family="Arial, Helvetica, sans-serif" font-size="30" fill="#ffffff" text-anchor="middle">{$escapedTitle}</text>
  <text x="50%" y="61%" font-family="Arial, Helvetica, sans-serif" font-size="20" fill="#cccccc" text-anchor="middle">{$escapedAge}</text>
</svg>
SVG;

        return $svg;
    }
}
