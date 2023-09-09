<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // relacion con agentes
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    // relacion con clientes
    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    // relacion con comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
