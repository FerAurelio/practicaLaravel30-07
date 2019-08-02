<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Genre extends Model
{
  public $guarded = ["id"];



  public function movies()
  {
    return $this->hasMany(Movie::class);
  }
}
