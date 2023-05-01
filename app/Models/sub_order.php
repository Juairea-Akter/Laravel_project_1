<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(order::class, 'order_id', 'id');
    }
    public function package()
    {
        return $this->belongsTo(packages::class, 'package_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function payment()
    {
        return $this->hasOne(payment::class, 'order_id', 'order_id');
    }
}
