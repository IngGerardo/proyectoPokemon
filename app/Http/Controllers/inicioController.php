<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\tipos;
use DB;
use App\pokemones;
use App\pok_tipo;

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
		
		$pokemon=DB::table('pokemones')
		->select('pokemones.id as id','pokemones.nombre as nombre', 'pokemones.descripcion as desc', 'pokemones.golpe as golpe', 'pokemones.peso as peso', 'pokemones.altura as altura', 'pokemones.cp as nivel' )
		->where('pokemones.id', '=', $request->input('id'))
		->first();
    	$vista=view('pdfPokemon', compact('pokemon'));
    	$dompdf=\App::make('dompdf.wrapper');
    	$dompdf->loadHTML($vista);
    	return $dompdf->stream('pokemons.pdf');
		//echo $request->input('id'); //con este id pueden hacer el pdf, eliminar y agregar o quitar tipo
		//return Redirect('/tipos/'.$request->input('id')); //Descomentar cuando se haya terminado el proceso
	}
	public function tipo(Request $request)
	{
		echo $request->input('id'); //con este id pueden hacer el pdf, eliminar y agregar o quitar tipo
		//return Redirect('/tipos/'.$request->input('id')); //Descomentar cuando se haya terminado el proceso
	}
	public function quitar(Request $request)
	{
		$pokemon = DB::table('tipos')
		->join('pok_tipo','pok_tipo.id_tipo','=','tipos.id')
		->join('pokemones','pok_tipo.id_pokemon','=','pokemones.id')
        ->select('tipos.id as tipoId')
        ->where('pokemones.id','=',$request->input('id'))
        ->first();

        //dd($pokemon);

		pokemones::find($request->input('id'))->delete(); //con este id pueden hacer el pdf, eliminar y agregar o quitar tipo
		//return Redirect('/tipos/'.$pokemon); //Descomentar cuando se haya terminado el proceso
		return Redirect('/tipos/'.$pokemon->tipoId);
	}
}
