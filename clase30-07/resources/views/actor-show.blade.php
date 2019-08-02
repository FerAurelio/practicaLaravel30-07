<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$actor->getFullName()}}</title>
<link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
  <ul>
    {{$actor->getFullName()}}: <br>
        <li>
        Rating: {{$actor->rating}};
        </li>
        <li>
        Pelicula favorita:    @foreach  ($movies as $movie)
       @if ($movie->id==$actor->favorite_movie_id)
         {{$movie->title}}
       @endif
            @endforeach
        </li>
        @if (count($actor->movies) > 0)
  			<li><b>Peliculas en las q actuó:</b><br>
  				@foreach ($actor->movies as $movie)
  					<a href="/movies/detalle/{{$movie->id}}"><i>{{ $movie->title }}</i></a><br>
  				@endforeach
  			</li>
  			@endif
        <img src="/storage/{{ $actor->poster }}" width="100"><br><br>
        {{--   @auth--}}
                {{-- @if (Auth::user()->id === $movieToFind->user_id)
                @endif --}}
                <form action="/actor/{{ $actor->id }}" method="post">
                  @csrf
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-danger">BORRAR</button>
                  <a href="edit/{{$actor->id }}" class="btn btn-warning">Editar</a>
                </form>
                    {{-- @endauth--}}
      	</body>

</html>
