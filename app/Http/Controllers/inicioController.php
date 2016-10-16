<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\tipos;
use DB;
use App\items;
use App\pokemones;
use App\pok_tipo;

class inicioController extends Controller
{
	protected $table = 'pokemones';
  
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
	public function poder(Request $request)
	{
		//$puntosCombate = DB::table('pokemones')
		//->update(['cp' => $comprado]);
		//echo $request->input('id');
		$pokemones = DB::table('pokemones')
		->select('pokemones.cp','pokemones.id')
        ->where('pokemones.id','=',$request->input('id'))
        ->first();

        $items = DB::table('items')
		->select('items.caramelos','items.polvos')
        ->first();

        $pokfin=$pokemones->cp+200;
        $carfin=$items->caramelos-3;
        $polfin=$items->polvos-100;

		if ($items->caramelos>=3){
			if ($items->polvos>=100){

			$pok=DB::table('pokemones')	
			->where('pokemones.id','=',$request->input('id'))
			->update(['cp' => $pokfin]);

			$ite=DB::table('items')		
			->update(['caramelos' => $carfin, 'polvos' => $polfin]);
			}else
			echo '<script language="javascript">alert("No tienes polvos suficientes para asignar mas poder");</script>';		
		}else 
		echo '<script language="javascript">alert("No tienes caramelos suficientes para asignar mas poder");</script>'; 

		return Redirect('/');
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
