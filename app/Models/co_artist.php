<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class co_artist extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function  artist()
    {
        return $this->belongsTo(User::class, 'makeup_artist_id', 'id');
    }
}
