<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_feedback extends Model
{
    use HasFactory;
    protected $guarded = [];  
    
    public function  sub_order()
    {
        return $this->belongsTo(sub_order::class, 'sub_order_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
