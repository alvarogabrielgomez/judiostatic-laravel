<?php

namespace judiostatic\Http\Controllers;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index(Request $request){

        if($request->ajax()){
            return response()->json([
                ['id' => 1, 'name' => 'Pikachu'],
                ['id' => 2, 'name' => 'Pikachu'],
                ['id' => 3, 'name' => 'Pikachu'],
                ['id' => 4, 'name' => 'Pikachu']

            ]);
        }
        return view ('pokemons.index');
    }

    public function store(Request $request){
        if ($request->ajax()) {
            $pokemon = new Pokemon();
            $pokemon->name = $request->input('name');
            $pokemon->picture =  $request->input('picture');
            $pokemon->save();

            return response()->json([
                "message" => "Pokemon Saved"
            ], 200);
        }
    }

    public function qrcode(Request $request){
        $data = $request->data;
        $size = $request->size;
        $format = 'png';
        if(Request::has('format')){
            $format = $request->format;
        }
        $color = $request->color;
        $backgroundColor = $request->backgroundColor;
        $margin =  $request->margin;
        $errorCorrection =  $request->errorCorrection;

    }

}
