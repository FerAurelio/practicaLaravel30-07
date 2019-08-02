<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Movie extends Model
{
  public $guarded = ["id"];

  public function genre()
{
  return $this->belongsTo(Genre::class);
}
public function actors()
{
  return $this->belongsToMany(Actor::class);
}
// Para traer el valor de la fecha como tal
protected $dates = ['release_date'];
}
