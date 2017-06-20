<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
  //public $table = 'machines';

  protected $guarded = ['id'];

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function subscribers()
  {
      return $this->belongsToMany(User::class, 'machine_subscribers');
  }

  public function topics()
  {
      return $this->belongsToMany(Topic::class, 'machine_topics');
  }

  public function authors()
  {
      return $this->belongsToMany(User::class, 'machine_authors');
  }

  public function points()
  {
      return $this->hasMany(Point::class);
  }

  public function links($params = [])
  {
      return route('machines.show', array_merge([$this->id], $params));
  }

}
