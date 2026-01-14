<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class play extends Model
{
    protected $primaryKey = 'playId';

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
