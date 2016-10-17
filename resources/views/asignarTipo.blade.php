@extends ('welcome')

@section ('encabezado')
	<br>
	<h2>Asignar tipo a {{$poke->pnombre}}</h2>
	<br>
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
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Tipo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pasign as $u)
			<tr>
				<td>{{$u->id}}</td>
				<td>{{$u->nombre}}</td>
				<td><a href="" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Quitar</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
@stop

@section ('contenido')
		
@stop