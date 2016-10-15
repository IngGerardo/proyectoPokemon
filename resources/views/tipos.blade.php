@extends ('welcome')

@section ('encabezado')
	<br>
	<h2>Pokémones tipo {{ $tipo->nombre }}</h2>
@stop

@section ('contenido')
<div class="jumbotron">
<p>Aqui mostraremos las especificaciónes de los pokemones deacuerdo a su tipo</p>
</div>
<div class="container-fluid">
<div class="row">
	@foreach($pokemon as $p)
	<div class="col-md-4" align="center">
		<div class="form-group fondo">
		<a href="" data-target="#dataPokemon" data-toggle="modal" data-id="{{ $p->id }}" data-descripcion="{{ $p->descripcion }}" data-nombrepokemon="{{ $p->nombre }}" title="{{ $p->nombre }}">
			<img src="../img/{{ $p->id }}.png" width="80%" class="img-responsive imagen carta"></a>
		</div>

	</div>
	@endforeach
</div>
</div>
      <div id="dataPokemon" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header modal-header-success">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <font color="white">
               <h4 class="modal-title" align="center"><span class="glyphicon glyphicon-copy"></span><p id="nombrepokemon" /></h4>
              </font>
            </div>
            <div class="modal-body">
            	<div class="container-fluid">
            	<div class="row">
            	<div class="col-xs-6" align="center">
            		<p id="imagen"></p>
            		<form action="{{ url('/PDF') }}" method="POST" style="display:inline;">
            			<input type="hidden" name="_token" value="{{ csrf_token() }}">
            			<input type="hidden" id="id" name="id">
            			<button type="submit" class="btn btn-success">PDF</button>
            		</form>
            		<form action="{{ url('/Tipo') }}" method="POST" style="display:inline;">
            			<input type="hidden" name="_token" value="{{ csrf_token() }}">
            			<input type="hidden" id="id" name="id">
            			<button type="submit" class="btn btn-info">Tipo</button>
            		</form>
            		<form action="{{ url('/Quitar') }}" method="POST" style="display:inline;">
            			<input type="hidden" name="_token" value="{{ csrf_token() }}">
            			<input type="hidden" id="id" name="id">
            			<button type="submit" class="btn btn-danger">Quitar</button>
            		</form>
            	</div>
              <div class="container-fluid">
              <div class="row">
            	<div class="col-xs-6" align="left" style="text-align: justify; text-justify: inter-word;">
            		    <h4><b>Descripción</b></h4>
            		    <p id="descripcion"></p>
                </div>
                </div>
            	</div>
            	</div>
            	</div>
            </div>
          </div>
        </div>
      </div>
      <!--<footer>
      				<div class="row">
      					<div class="col-xs-12">
						<div class="form-group" align="center">
								<br>
								<audio controls autoplay>
								    <source src="{{ asset("musica/pokemon.mp3") }}" type="audio/mpeg">
									Your browser does not support the audio element.
								</audio>
						</div>					
						</div>
					</div>	
      </footer>-->
      <script type="text/javascript">
      $(document).ready(function(){
      $('[data-toggle="modal"]').tooltip();
      $('#dataPokemon').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var id = button.data('id');
            var descripcion = button.data('descripcion');
            var nombrepokemon = button.data('nombrepokemon');

            var modal = $(this)
            modal.find('.modal-body #id').val(id)

            $('#imagen').html("<img src='../img/"+ id+".png' width='100%' class='img-responsive imagen carta'>");
            $('#descripcion').html(descripcion);
            $('#nombrepokemon').html(nombrepokemon);

            });
			});
		</script>
@stop