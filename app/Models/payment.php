<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{    protected $guarded = [];
    use HasFactory;
    public function  package()
    {
        return $this ->belongsTo(packages::class, 'package_id', 'id');
    }
   
}