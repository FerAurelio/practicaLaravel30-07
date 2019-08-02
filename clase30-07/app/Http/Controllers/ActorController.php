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


public function edit ($id)
	{
	  $actor=Actor::find($id);
    $movies=Movie::all();
		return view('actor-edit', compact('actor', 'movies'));
	}


public function update(Request $req, $id){
  $actor=Actor::find($id);
  $req->validate([
    'first_name' => 'required',
    'last_name' => 'required' ,
    'rating' => 'required|numeric|min:0|max:10',
    'file'=> 'mimes:jpg, png, jpeg'
   ],
   [
     'first_name.required' => 'El título es obligatorio',
     'last_name.required' => 'El género es obligatorio',
     'rating.required' => 'El rating es obligatorio',
     'rating.numeric' => 'El rating solo admite números',
     'rating.min' => 'El rating debe contener un número entre 0 y 10',
     'rating.max' => 'El rating debe contener un número entre 0 y 10',
     'file.mimes'=> 'El archivo debe ser una imagen con extension .jpg, .png o .jpeg'
   ]);

  $actor->first_name = $req['first_name'];
	$actor->last_name = $req['last_name'];
  $actor->rating = $req['rating'];
	$actor->favorite_movie_id = $req['favorite_movie_id'];

//  $imagen = $request["poster"];
		// Armo un nombre único para este archivo
//	$imagenFinal = uniqid("img_") . "." . $imagen->extension();
		// Subo el archivo en la carpeta elegida
//	$imagen->storePubliclyAs("public/posters", $imagenFinal);
		// Le asigno la imagen a la película que guardamos
//	$actor->poster = $imagenFinal;
//
    $imagen= $req->file("poster")->store("public");
    $nombreImagen=basename($imagen);
    $actor->poster=$nombreArchivo;
  $actor->save();
  return redirect('/actors');
}

public function show ($id)
	{
      $movies=Movie::all();
		$actor = Actor::find($id);
		return view('actor-show', compact('actor',"movies"));
	}
  public function destroy ($id)
	{
		$actorToDelete = Actor::find($id);
		$actorToDelete->delete();
		// Redireccionamos
		return redirect('/actor');
	}
}
