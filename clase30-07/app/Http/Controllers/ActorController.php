<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;
use App\Movie;

class ActorController extends Controller
{
  public function directory(){
      $actores = Actor::all();
      return view("actors", compact("actores"));
    }

    public function directory2(){
        $actores = Actor::all();
        return view("actor", compact("actores"));
      }


  public function add(){
    	$actores = Actor::orderBy('last_name')->get();
      $movies = Movie::orderBy('title')->get();

    		return view('actors-add', compact('actores','movies'));
    	}

 public function store(Request $req){

   $req->validate([
     'first_name' => 'required',
		 'last_name' => 'required' ,
		 'rating' => 'required|numeric|min:0|max:10',
		],
    [
			'first_name.required' => 'El título es obligatorio',
			'last_name.required' => 'El género es obligatorio',
			'rating.required' => 'El rating es obligatorio',
			'rating.numeric' => 'El rating solo admite números',
			'rating.min' => 'El rating debe contener un número entre 0 y 10',
      'rating.max' => 'El rating debe contener un número entre 0 y 10',
		]);

    Actor::create($req->all());
   return redirect('/actors');
 }
 public function favorite_movie_id()
 	{
 	  $movies = Movie::orderBy("title")->get();
 		return view('movies-add', compact('movies'));
 	}

public function edit(Request $req, $id){
  $actor=Actor::find($id);
  $req->validate([
    'first_name' => 'required',
    'last_name' => 'required' ,
    'rating' => 'required|numeric|min:0|max:10',
   ],
   [
     'first_name.required' => 'El título es obligatorio',
     'last_name.required' => 'El género es obligatorio',
     'rating.required' => 'El rating es obligatorio',
     'rating.numeric' => 'El rating solo admite números',
     'rating.min' => 'El rating debe contener un número entre 0 y 10',
     'rating.max' => 'El rating debe contener un número entre 0 y 10',
   ]);

  $actor->first_name = $req['first_name'];
	$actor->last_name = $req['last_name'];
  $actor->rating = $req['rating'];
	$actor->favorite_movie_id = $req['favorite_movie_id'];

 $actor->save();
  return view('actor-edit');
}

}
