@extends ('welcome')

@section ('encabezado')
@stop

@section ('contenido')
<br><br>
			<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
    			      <h3 class="panel-title" align="center">Registre un Pokémon</h3>
  				    </div>
  			 	         <div class="panel-body">
					<form action="{{url('/guardarPokemon')}}" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="form-group">
							<label for="nombre">Nombre:</label>
							<input name="nombre" type="text" class="form-control" placeholder="Nombre" required>
						</div>
						<div class="form-group">
							<label for="descripcion">Descripción:</label>
							<input name="descripcion" type="text" class="form-control" placeholder="Descripcion" required>
						</div>
						<div class="form-group">
							<label for="golpe">Golpe:</label>
							<input name="golpe" type="text" class="form-control" placeholder="Golpe" required>
						</div>
						<div class="form-group">
							<label for="golpef">Golpe final:</label>
							<input name="golpef" type="text" class="form-control" placeholder="GolpeF" required>
						</div>
						<div class="form-group">
							<label for="peso">Peso:</label>
							<input name="peso" type="text" class="form-control" placeholder="Peso" required pattern="[0-9]*[.][0-9][0-9]+">
						</div>
						<div class="form-group">
							<label for="altura">Altura:</label>
							<input name="altura" type="text" class="form-control" placeholder="Altura" required pattern="[0-9]*[.][0-9][0-9]+">
						</div>
						<div class="form-group">
							<label for="cp">Puntos de combate:</label>
							<input name="cp" type="number" class="form-control" placeholder="Puntos de combate" required>
						</div>
						 <div class="form-group">
			                <label for="image">Imágen:</label>
			                <div class="input-group">  
			                  <input type="file" name="imagen" id="imagen" required /> no se te quita la maña es required!!!!!!!!! intenta hacer push

			                </div>  
			              </div> 
						<input type="submit" value="Registrar" class="btn btn-primary" align="center">
						<a href="{{url('/')}}" class="btn btn-danger" align="center">Cancelar</a>
					</form>
					</div>
				</div>
			</div>
@stop