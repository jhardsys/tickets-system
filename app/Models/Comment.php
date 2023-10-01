<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relacion con tickets
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    // relacion polimorfica con  clientes
    public function commentable()
    {
        return $this->morphTo();
    }
}
