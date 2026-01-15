<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $primaryKey = 'hallId';

    protected $fillable = [
        'hallName',
        'cinemaId',
        'seats', 
    ];

    public function cinema()
    {
        return $this->belongsTo(Cinema::class, 'cinemaId', 'cinemaId');
    }

    public function plays()
    {
        return $this->hasMany(Play::class, 'hallId', 'hallId');
    }
}
