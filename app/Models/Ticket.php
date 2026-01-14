<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $primaryKey = 'ticketId';

    public function play()
    {
        return $this->belongsTo(Play::class, 'playId', 'playId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
