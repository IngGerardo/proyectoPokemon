<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PDF Pokemon</title>

	<style>
th, td {
    padding: 15px;
    text-align: left;
    border: 1px solid black;
}

table{
	border-collapse: collapse;
	border: 1px solid black;


}
div{
	margin: auto;
    width: 50%;
    
    padding: 10px;
}
h2{
	margin: auto;
	width: 50%;
    
    padding: 10px;
}
.center{
	 margin: auto;
    width: 60%;
    padding: 40px;
}


</style>    
</head>
<body>
	<div class="center"><a href="">
			
			<img src="img/{{ $pokemon->id }}.png" width="30%" align="center" class="img-responsive imagen carta"></a>
	</div>
	<h2>{{ $pokemon->nombre }}</h2>
	<h2>{{ $pokemon->desc }}</h2>
	<div> 
		<table > 
			<thead> 
				<tr> 
					<th>Ataque</th> 
					<th>Peso</th> 
					<th>Altura</th> 
					<th>Nivel</th> 
				</tr> 
			</thead> 
				<tbody> 
				<tr> 
					<td>{{ $pokemon->golpe }}</td> 
					<td>{{ $pokemon->peso }}</td> 
					<td>{{ $pokemon->altura }}</td> 
					<td>{{ $pokemon->nivel }}</td> 
				</tr> 
				</tbody> 
		</table> 
	</div>
	
	
	
	
</body>
</html>