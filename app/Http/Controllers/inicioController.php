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
		echo $request->input('id'); //con este id pueden hacer el pdf, eliminar y agregar o quitar tipo
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
}
