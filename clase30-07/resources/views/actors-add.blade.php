<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agregar Actor</title>
<link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
      <div class="container">
      			<div class="row justify-content-center">
      				<div class="col-10">
      					<h2>Crear actor</h2>
                <form action="/actors/add" method="post">
  			  			@csrf
      						<div class="row">
      							<div class="col-6">
      								<div class="form-group">
      									<label>Nombre:</label>
      									<input type="text" class="form-control" placeholder="Ej: Lindsay" name="first_name" value="{{old('first_name')}}">
                        @error ('first_name')
							<i style="color: red;"> {{ $errors->first('first_name') }}</i>
						@enderror
      								</div>
      							</div>
      							<div class="col-6">
      								<div class="form-group">
      									<label>Apellido:</label>
      									<input type="text" class="form-control" placeholder="Ej: Lohan" name="last_name" value="{{old('last_name')}}">
                        @error ('last_name')
							<i style="color: red;"> {{ $errors->first('last_name') }}</i>
						@enderror
      								</div>
      							</div>
      							<div class="col-6">
      								<div class="form-group">
      									<label>Rating:</label>
      									<input type="text" class="form-control" placeholder="Ej: 6.3" name="rating" value="{{old('rating')}}">
                        @error ('rating')
							<i style="color: red;"> {{ $errors->first('rating') }}</i>
						@enderror
      								</div>
      							</div>
      							<div class="col-6">
      								<div class="form-group">
      									<label>Película favorita:</label>
      									<select class="form-control" name="favorite_movie_id" value="{{old('favorite_movie_id')}}">
      										<option value="">Elegí una película favorita:</option>

                     @foreach  ($movies as $movie)
								<option value="{{ $movie->id }}"> {{ $movie->title }}</option>
                      @endforeach
      									</select>
      								</div>
                          							</div>
      							<div class="col-12 text-center">
      								<button type="submit" class="btn btn-primary">GUARDAR</button>
      							</div>
      						</div>
      					</form>
      				</div>
      			</div>

      		</div>

      	</body>

</html>
