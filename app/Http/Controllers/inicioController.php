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

	public function guardarPokemon(Request $request)
	{
		$nuevo= new pokemones();
    	$nuevo->nombre=$request->input('nombre');
    	$nuevo->descripcion=$request->input('descripcion');
    	$nuevo->golpe=$request->input('golpe');
    	$nuevo->golpef=$request->input('golpef');
    	$nuevo->peso=$request->input('peso');
    	$nuevo->altura=$request->input('altura');
    	$nuevo->cp=$request->input('cp');
    	$nuevo->save();

    	return Redirect('/')->with('registro', '¡Pokémon registrado exitosamente a la Pokédex!');
	}
  
    public function consultarTipos()
	{
		$tipos = tipos::all();
		return view('principal',compact('tipos'));
	}

	public function polvosPokemon(Request $request)
	{
		$item = DB::table('items')
		->select('items.caramelos','items.polvos')
        ->first();

		$car=$item->caramelos+0;
		$pol=$item->polvos + $request->input('polvos');

		$ite=DB::table('items')		
		->update(['caramelos' => $car, 'polvos' => $pol]);
		
		return redirect('/')->with('addPolvo', '¡Asignaste '.$request->input('polvos').' polvos mágicos a tu Pokédex!');;
	}
	public function caramelosPokemon(Request $request)
	{
		$item = DB::table('items')
		->select('items.caramelos','items.polvos')
        ->first();

		$car=$item->caramelos+ $request->input('caramelos');
		$pol=$item->polvos+0; 

		$ite=DB::table('items')		
		->update(['caramelos' => $car, 'polvos' => $pol]);
		
		return redirect('/')->with('addCaramelos', '¡Asignaste '.$request->input('caramelos').' caramelos a tu Pokédex!');;;
	}

	public function registroPokemon()
	{
		$tipos = tipos::all();
		return view('registroPokemon',compact('tipos'));
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
		
		$pokemon=DB::table('tipos')
		->join('pok_tipo','pok_tipo.id_tipo','=','tipos.id')
		->join('pokemones','pok_tipo.id_pokemon','=','pokemones.id')
		->select('pokemones.id as id','pokemones.nombre as nombre', 'pokemones.descripcion as desc', 'pokemones.golpe as golpe', 'pokemones.peso as peso', 'pokemones.altura as altura', 'pokemones.cp as nivel','tipos.nombre as tipo')
		->where('pokemones.id', '=', $request->input('id'))
		->first();

		$tiposPok=DB::table('tipos')
		->join('pok_tipo','pok_tipo.id_tipo','=','tipos.id')
		->join('pokemones','pok_tipo.id_pokemon','=','pokemones.id')
		->select('tipos.nombre as tipo')
		->where('pokemones.id', '=', $request->input('id'))
		->get();

    	$vista=view('pdfPokemon', compact('pokemon','tiposPok'));
    	$dompdf=\App::make('dompdf.wrapper');
    	$dompdf->loadHTML($vista);
    	return $dompdf->stream('pokemons.pdf');
		//echo $request->input('id'); //con este id pueden hacer el pdf, eliminar y agregar o quitar tipo
		//return Redirect('/tipos/'.$request->input('id')); //Descomentar cuando se haya terminado el proceso

	}
	public function tipo(Request $request)
	{
		$poke = DB::table('tipos')
		->join('pok_tipo','pok_tipo.id_tipo','=','tipos.id')
		->join('pokemones','pok_tipo.id_pokemon','=','pokemones.id')
        ->select('pokemones.nombre as pnombre', 'pokemones.id as idp')
        ->where('pokemones.id','=',$request->input('id'))
        ->first();

        $tipos=tipos::all();

        $pasign=DB::table('tipos AS u')
        ->select('up.id as idup','u.id','u.nombre')
        ->join('pok_tipo AS up','u.id','=','up.id_tipo' )
        ->where('up.id_pokemon','=', $request->input('id'))
        ->get();

        $Lista=DB::table('pok_tipo AS up')
        ->where('up.id_pokemon','=',$request->input('id'))
        ->pluck('up.id_tipo');


        $tiposNo=DB::table('tipos')
        ->whereNotIn('id',$Lista)
        ->get();


        $pokemones=pokemones::find($request->input('id'));

		return view('asignarTipo',compact('poke','tipos','pasign','tiposNo','pokemones'));

		//echo $request->input('id'); //con este id pueden hacer el pdf, eliminar y agregar o quitar tipo
		//return Redirect('/tipos/'.$request->input('id')); //Descomentar cuando se haya terminado el proceso
	}
	public function poder(Request $request)
	{
		//$puntosCombate = DB::table('pokemones')
		//->update(['cp' => $comprado]);
		//echo $request->input('id');
		$pokemones = DB::table('tipos')
		->join('pok_tipo','pok_tipo.id_tipo','=','tipos.id')
		->join('pokemones','pok_tipo.id_pokemon','=','pokemones.id')
		->select('pokemones.cp','tipos.id as tipo','pokemones.nombre')
        ->where('pokemones.id','=',$request->input('id'))
        ->first();

        $items = DB::table('items')
		->select('items.caramelos','items.polvos')
        ->first();

        $nombre=$pokemones->nombre;
        $poder=$pokemones->cp;
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
			return redirect('/tipos/'.$pokemones->tipo)->with('polvos', '¡No tienes polvos suficientes para asignar mas poder!');					
		}else
		return redirect('/tipos/'.$pokemones->tipo)->with('caramelos', '¡No tienes caramelos suficientes para asignar mas poder!'); 
 
		return Redirect('/tipos/'.$pokemones->tipo)->with('poder', '¡Poder asignado a '.$nombre.' de '.$poder.' a '.$pokfin.'!');
	}

	public function ponertipo($idp, Request $datos){
		 $nuevo=new pok_tipo(); 
            $nuevo->id_pokemon=$idp;
            $nuevo->id_tipo=$datos->input('user');
            $nuevo->save();

            return Redirect('/poketipo/'.$idp);

	}

	public function poketipo($idp){
		 $poke = DB::table('tipos')
		->join('pok_tipo','pok_tipo.id_tipo','=','tipos.id')
		->join('pokemones','pok_tipo.id_pokemon','=','pokemones.id')
        ->select('pokemones.nombre as pnombre', 'pokemones.id as idp')
        ->where('pokemones.id','=',$idp)
        ->first();

        $tipos=tipos::all();

        $pasign=DB::table('tipos AS u')
        ->select('up.id as idup','u.id','u.nombre')
        ->join('pok_tipo AS up','u.id','=','up.id_tipo' )
        ->where('up.id_pokemon','=', $idp)
        ->get();

        $Lista=DB::table('pok_tipo AS up')
        ->where('up.id_pokemon','=',$idp)
        ->pluck('up.id_tipo');


        $tiposNo=DB::table('tipos')
        ->whereNotIn('id',$Lista)
        ->get();


        $pokemones=pokemones::find($idp);

		return view('asignarTipo',compact('poke','tipos','pasign','tiposNo','pokemones'));
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

    public function quitartipo($idu, $idp){
        pok_tipo::find($idu)->delete();
        return Redirect('/poketipo/'.$idp);
    }
}
