<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
  public $guarded = ["id"];

  public function actors()
	{
		return $this->belongsTo(Actor::class,"favorite_movie_id");
	}


}
