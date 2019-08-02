<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Movie;
use App\Genre;

class MovieController extends Controller
{

public function detalle ($id)
	{

    $movieToFind= Movie::find($id);

		return view('movies-detalle', compact("movieToFind"));
	}
}
