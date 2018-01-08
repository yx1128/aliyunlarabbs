<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Activity extends Model
{
    protected $fillable = ['causer', 'indentifier', 'type', 'data'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function getDataAttribute($value)
    {
        return unserialize($value);
    }

    public static function allFromCache($expire = 1440)
    {
      return Cache::remember('phphub_activities', $expire, function () {
            return Cache::get('phphub_activities');
      });

    }
}
