@extends ('welcome')

@section ('encabezado')
	<br>
	<h2>Asignar tipo a {{$poke->pnombre}}</h2>
	<br>
@stop

@section ('contenido')
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title" align="center">{{$poke->pnombre}}</h3>
  				    </div>
  			 	     <div class="panel-body">
						<form method='POST' action="{{url('/poketip')}}/{{$poke->idp}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
							<div class="form-group">
								<select class="form-control" name='user'>
									<option>Seleccionar Tipo</option>
									@foreach($tiposNo as $up)
									<option value="{{$up->id}}">{{$up->nombre}}</option>
									@endforeach
								</select>
							</div>
							<input type="submit" value="Asignar" class="btn btn-primary">
						</form>
						</div>
				</div>
			</div>
		</div>
	<br>
	<h3>Tipos asignados:</h3>
	<table class="table table-hover">
		<thead>
			<tr>
				<th align="center">#</th>
				<th align="center">Tipo</th>
				<th align="center">Opción</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pasign as $u)
			<tr>
				<td align="center">{{$u->id}}</td>
				<td align="center">{{$u->nombre}}</td>
				<td align="center"><a href="{{url('/quitartipo')}}/{{$u->idup}}/{{$poke->idp}}" class="btn btn-danger btn-xs"><span class="fa fa-times" aria-hidden="true"></span> Quitar</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop