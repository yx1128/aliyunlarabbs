<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
     public $table = 'points';

     protected $guarded = ['id'];

     public function machine()
     {
      return $this->belongsTo(Machine::class);
     }

     public function values()
     {
       return $this->hasMany(Value::class);
     }


}
