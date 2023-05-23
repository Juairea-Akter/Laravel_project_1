<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function  user()
    {
        return $this ->belongsTo(User::class, 'user_id', 'id');
    }
    public function sub_order()
    {
        return $this ->hasOne(sub_order::class,'order_id', 'id');
    }
    public function package()
    {
        return $this ->belongsTo(packages::class,'order_id', 'id');
    }

    public function payment()
    {
        return $this ->hasOne(payment::class,'order_id', 'id');
    }


}
