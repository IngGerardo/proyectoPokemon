@extends ('welcome')

@section ('encabezado')
	<br>
	<h2 align="left">Pokémones tipo {{ $tipo->nombre }}
    @if ($tipo->nombre== "Planta")
    <img src="../img/tipoplanta.png" width="4%" align="left">
    @elseif ($tipo->nombre== "Fuego")
    <img src="../img/tipofuego.png" width="4%" align="left">
    @elseif ($tipo->nombre== "Electrico")
    <img src="../img/tipoelectrico.png" width="4%" align="left">
    @elseif ($tipo->nombre== "Roca")
    <img src="../img/tiporoca.png" width="4%" align="left">
    @elseif ($tipo->nombre== "Agua")
    <img src="../img/tipoagua.png" width="4%" align="left">
    @elseif ($tipo->nombre== "Dragón")
    <img src="../img/tipodragon.png" width="4%" align="left">
    @endif
  </h2>
@stop
@section ('contenido')
<br>
              @if (session('poder'))
                  <div id="alert" class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span>&times;</button>
                      <strong>{{ session('poder') }}</strong>
                  </div>
              @endif
              @if (session('polvos'))
                  <div id="alert" class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span>&times;</button>
                      <strong>{{ session('polvos') }}</strong>
                  </div>
              @endif
              @if (session('caramelos'))
                  <div id="alert" class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span>&times;</button>
                      <strong>{{ session('caramelos') }}</strong>
                  </div>
              @endif
<div class="jumbotron">
  <div class="container" style="text-align: justify">
   @if ($tipo->nombre== "Planta")
   <font size="8px">
     <p>Los Pokémon de tipo planta suelen ser pacíficos y les gusta cuidar de las flores y a los demás, pero también son 
    grandes luchadores y pueden envenenar, paralizar o dormir al rival en combate. <br>
    Normalmente su cuerpo suele ser igual a alguna especie vegetal, en cuyo caso el Pokémon crece en un desarrollo muy
    similar a un vegetal.</p>          
  </font>
   @elseif ($tipo->nombre== "Fuego")
   <font size="8px">
     <p>Los Pokémon de tipo fuego basan sus ataques principalmente en el control de este elemento y la mayoría de estos ataques 
      pueden quemar al Pokémon oponente. <br>
      Son apasionados y algunos de mal carácter, viven en cuevas o zonas rocosas y muy áridas, y es más probable que vivan cerca 
      de volcanes activos</p>          
  </font>
  @elseif ($tipo->nombre== "Electrico")
   <font size="8px">
     <p>Los Pokémon del tipo eléctrico tienen hábitats variados, desde bosques, praderas, ciudades y centrales eléctricas. 
      Sólo teniendo en cuenta que los tipo planta, los tipo eléctrico y los tipo dragón son resistentes a éstos y aún más los tipo tierra,
      quienes son inmunes a sus ataques.</p>          
  </font>
  @elseif ($tipo->nombre== "Roca")
   <font size="8px">
     <p>Los Pokémon tipo roca destacan por su gran defensa frente a ataques físicos. Sin embargo, tienen en su contra varias debilidades 
      con respecto a otros tipos, y los Pokémon de este tipo no se caracterizan por ser muy veloces. Cabe destacar que la mayoría de los 
      movimientos de tipo roca (sobre todo los físicos) poseen baja precisión a la hora de atacar.</p>          
  </font>
   @elseif ($tipo->nombre== "Agua")
   <font size="8px">
     <p>Los Pokémon de tipo agua se sienten a menudo libres en cualquier sitio donde haya agua a su disposición. La mayoría de estos Pokémon 
      pertenecen también a otros tipos. Por esto se dice que los Pokémon de agua son muy adaptables y su dinamismo los hace destacarse en 
      concursos, presentaciones y evasión de ataques. Como viven en el agua, muchos de ellos están provistos de aletas.</p>          
  </font>
   @elseif ($tipo->nombre== "Dragón")
   <font size="8px">
     <p>Es un tipo elemental ancestral; muchos de los últimos Pokémon legendarios descubiertos, considerados deidades, son del tipo dragón: 
      Rayquaza (cielo), Giratina (antimateria), Dialga (tiempo), Palkia (espacio), Zekrom y Reshiram (Yin y Yang), Kyurem (el cero absoluto, 
      ausencia de energía) y Zygarde (orden). Otros Pokémon de este tipo se caracterizan por ser difíciles de atrapar y entrenar. Es interesante 
      el hecho de que muchos Pokémon del tipo "Dragón" llegan a superar las estadísticas comunes.</p>          
  </font>
    @endif
</div>
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
              <div class="container-fluid">
              <div class="row">
            	<div class="col-xs-12" align="left" style="text-align: justify; text-justify: inter-word;">
            		    <h4><b>Descripción</b></h4>
            		    <p id="descripcion"></p>
                </div>
              <div class="col-xs-12" align="center">
                <p id="imagen"></p>
                <form action="{{ url('/Poder') }}" method="POST" style="display:inline;">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" id="id" name="id">
                  <button type="submit" class="btn btn-warning">Poder <span class="fa fa-plus-circle" aria-hidden="true"></button>
                </form>
                <form action="{{ url('/PDF') }}" method="POST" style="display:inline;">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" id="id" name="id">
                  <button type="submit" class="btn btn-success">PDF <span class="fa fa-file" aria-hidden="true"></button>
                </form>
                <form action="{{ url('/Tipopokemon') }}" method="POST" style="display:inline;">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" id="id" name="id">
                  <button type="submit" class="btn btn-primary">Tipo <span class="fa fa-pencil" aria-hidden="true"></button>
                </form>
                <form action="{{ url('/Quitar') }}" method="POST" style="display:inline;">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" id="id" name="id">
                  <button type="submit" class="btn btn-danger">Quitar <span class="fa fa-times" aria-hidden="true"></button>
                </form>
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