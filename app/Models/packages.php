<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packages extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function  category()
    {
        return $this ->belongsTo(category::class, 'cat_id', 'id');
    }
    public function  sub_category()
    {
        return $this ->belongsTo(sub_category::class, 'sub_cat_id', 'id');
    }
}
