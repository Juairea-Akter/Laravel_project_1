<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class sub_category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function  category()
    {
        return $this ->belongsTo(category::class, 'cat_id', 'id');
    }
}