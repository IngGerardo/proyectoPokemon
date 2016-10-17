<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PDF Pokemon</title>

	<style>
<style type="text/css">

.imag{
	background-color: white;
}

.encabezado{
	color: white;
	background-color: #8eef8b;
}

	table{
  width: 100%
}
table, th, td { 
    padding: 1px;
    border-collapse: collapse;
    text-align: center;
    
}
th, td {
    padding: 5px;
}

tr:nth-child(even){background-color: #f2f2f2}

</style>

		<table >
				<tbody> 
					<tr>
					<th><div class=""><a href=""><img src="img/titulo.png" width="1500%" align="center" class="img-responsive imagen carta"></a></div></th>
				</tr>
				</tbody> 
		</table> 
</head>
<body>
	<div> 
		<table > 
			<thead> 
				<tr class="encabezado" border="2px"> 
					<th><font FACE="sans-serif"><p>Nombre</p></font></th> 
				</tr> 
			</thead> 
				<tbody> 
				<tr> 
					<td><font FACE="sans-serif"><p>{{ $pokemon->nombre }}</p></font></td> 
				</tr> 
				</tbody> 
		</table> 
		<br>
		<br>
		<table > 
				<tbody> 
						<th ><div class="imag"><a href=""><img src="img/{{ $pokemon->id }}.png" width="1900%" align="center" class="img-responsive imagen carta"></a></div></th>
				</tbody> 
		</table> 
	<table > 
			<thead> 
				<tr class="encabezado" border="2px"> 
					<th><font FACE="sans-serif"><p>Descripcion</p></font></th> 
				</tr> 
			</thead> 
				<tbody> 
				<tr> 
					<td><font FACE="sans-serif"><p>{{ $pokemon->desc }}</p></font></td>  
				</tr> 
				</tbody> 
		</table> 
		<table > 
			<thead> 
				<tr class="encabezado" border="2px"> 
					<th><font FACE="sans-serif"><p>Tipo</p></font></th> 
					<th><font FACE="sans-serif"><p>Ataque</p></font></th> 
					<th><font FACE="sans-serif"><p>Peso</p></font></th> 
					<th><font FACE="sans-serif"><p>Altura</p></font></th> 
					<th><font FACE="sans-serif"><p>Nivel</p></font></th> 
				</tr> 
			</thead> 
				<tbody> 
				<tr>
											
					<td>@foreach($tiposPok as $tipos)	<font FACE="sans-serif"><p>{{ $tipos->tipo }}</p></font>
						@endforeach
					</td>  		
					<td><font FACE="sans-serif"><p>{{ $pokemon->golpe }}</p></font></td> 
					<td><font FACE="sans-serif"><p>{{ $pokemon->peso }}</p></font></td> 
					<td><font FACE="sans-serif"><p>{{ $pokemon->altura }}</p></font></td> 
					<td><font FACE="sans-serif"><p>{{ $pokemon->nivel }}</p></font></td> 
				</tr> 
				</tbody> 
		</table> 
	</div>
	<footer>
		<center><font FACE="sans-serif"><p>PDF pokemon &copy; 2016 <img src="img/goe.png" width="4%" align="center"></p></font></center>
</footer>
</body>
</html>