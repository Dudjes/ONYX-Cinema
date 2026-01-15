<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
    protected $primaryKey = 'playId'; 

    protected $fillable = [
        'movieId',
        'hallId',
        'cinemaId',
        'when',   
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movieId', 'movieId');
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class, 'hallId', 'hallId');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'playId', 'playId');
    }

    public function cinema()
    {
        return $this->belongsTo(Cinema::class, 'cinemaId', 'cinemaId');
    }
}
