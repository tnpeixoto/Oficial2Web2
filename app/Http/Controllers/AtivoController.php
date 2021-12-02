<?php

// União Metropolitana de Educação e Cultura 
// Bacharelado em Sistemas de Informação 
// Programação para Web II

// Douglas Acaua Santos Pereira
// Tiago Nogueira Peixoto 


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreAtivoRequest;
use App\Http\Requests\UpdateAtivoRequest;
use App\Models\Api\Ativo;

class AtivoController extends Controller
{
  public function index()
  {
    $ativos = Ativo::all();
    return response()->json($ativos,);
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), (new StoreAtivoRequest())->rules());
    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }
    $ativo = Ativo::create($request->all());
    return response()->json($ativo, 201,);
  }

  public function show($id)
  {
    if (Ativo::where('id', $id)->exists()) {
      $ativo = Ativo::find($id);

      return response()->json($ativo);
    } else {
      return response()->json([
        "mensagem" => "ativo não encontrado"
      ], 404);
    }
  }

  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(), (new UpdateAtivoRequest())->rules());
    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }

    $ativo = Ativo::find($id);
    if (is_null($ativo)) {
      return response()->json(["mensagem" => "ativo não identificado"], 404);
    }
    $ativo->update($request->all());
    return response()->json($ativo, 200);
  }

  public function destroy($id)
  {

    if (Ativo::where('id', $id)->exists()) {
      $ativo = Ativo::find($id);
      $ativo->delete();

      return response()->json([
        "mensagem" => "registro deletado"
      ], 202);
    } else {
      return response()->json([
        "mensagem" => "ativo não encontrado"
      ], 404);
    }
  }
}
