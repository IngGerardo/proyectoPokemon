<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\tipos;
use DB;

class inicioController extends Controller
{

    public function consultarTipos()
	{
		$tipos = tipos::all();
		return view('principal',compact('tipos'));
	}

	public function tipoxpokemon($id)
	{
		$pokemon = DB::table('tipos')
		->join('pok_tipo','pok_tipo.id_tipo','=','tipos.id')
		->join('pokemones','pok_tipo.id_pokemon','=','pokemones.id')
        ->select('tipos.nombre as tipoNombre','tipos.id as tipoId','pokemones.nombre','pokemones.id','pokemones.descripcion')
        ->where('tipos.id','=',$id)
        ->get();

        $tipo=DB::table('tipos')->where('id','=',$id)->select('nombre')->first();

        $tipos=tipos::all();

		return view('tipos',compact('pokemon','tipos','tipo'));
	}
	public function pdf(Request $request)
	{
		echo $request->input('id'); //con este id pueden hacer el pdf, eliminar y agregar o quitar tipo
		//return Redirect('/tipos/'.$request->input('id')); //Descomentar cuando se haya terminado el proceso
	}
	public function tipo(Request $request)
	{
		echo $request->input('id'); //con este id pueden hacer el pdf, eliminar y agregar o quitar tipo
		//return Redirect('/tipos/'.$request->input('id')); //Descomentar cuando se haya terminado el proceso
	}
	public function quitar(Request $request)
	{
		echo $request->input('id'); //con este id pueden hacer el pdf, eliminar y agregar o quitar tipo
		//return Redirect('/tipos/'.$request->input('id')); //Descomentar cuando se haya terminado el proceso
	}
}
