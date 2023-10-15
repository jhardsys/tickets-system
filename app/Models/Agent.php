<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    // relacion con tickets
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    protected $fillable = [
      'first_name',
      'first_surname',
      'second_surname',
      'phone',
    ];

    public function fullname(){
        return $this->first_name.' '. $this->first_surname;
    }
}
