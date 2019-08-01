<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Actores</title>
<link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
  <ul>
    Actores: <br>
    @foreach ($actores as $actor)
      <li>
        <p>
          <a href="/actor/{{$actor->id}}">
            {{$actor->getFullName()}}
          </a>
        
      </li>
    @endforeach
      	</body>

</html>
