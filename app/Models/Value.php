<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{

   protected $guarded = ['id'];

   protected $fillable = [
       'point_id',
       'value',
       'created_at',
       'updated_at',
       'is_warned'
   ];

    public function point()
    {
        return $this->belongsTo(Point::class);
    }
}
