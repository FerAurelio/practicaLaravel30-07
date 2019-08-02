<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$movieToFind->title}}</title>
<link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
      <div class="container" style="margin-top:30px; margin-bottom: 30px;">
      		<h2>Película: {{ $movieToFind->title }}</h2>
    
      		<ul>
      			<li><b>Rating:</b> {{ $movieToFind->rating }}</li>
      			<li><b>Género:</b> {{$movieToFind->genre->name}}</li>

      			@if (count($movieToFind->actors) > 0)
      			<li><b>Actores:</b><br>
      				@foreach ($movieToFind->actors as $actor)
      					<i>{{ $actor->getFullName() }}</i><br>
      				@endforeach
      			</li>
      			@endif


      		</ul>
      	</div>
      	</body>

</html>
