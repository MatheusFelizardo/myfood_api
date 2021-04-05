<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Alimento;
use App\Models\Receita;
use App\Models\ReceitaAlimento;


class ReceitasAlimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $receita = Receita::find($id);
        $alimentosDaReceita = ReceitaAlimento::all()->where('receita_id', $id);
       
        // Retorna um array com o id dos alimentos cadastrados na receita.
        $alimentos_id = [];
        // Retorna um array com o nome dos alimentos cadastrados na receita.
        $alimentos_item = [];

        foreach ($alimentosDaReceita as $alimentos) {
            $alimentosID = $alimentos->alimento_id;
            array_push($alimentos_id, $alimentosID);
            
            $alimentos = Alimento::find($alimentosID)->toArray();
            array_push($alimentos_item, $alimentos);
        }

        if($receita and $alimentosDaReceita) {
            return [
                'receita_id'=> $receita->id,
                'receita'=> $receita->nome,
                'alimentos'=>$alimentos_item
            ];
        }

        if($receita and !$alimentosDaReceita) {
            return response()->json("Receita sem alimentos cadastrados.");
        }

        return response()->json("Receita não encontrada.");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $recipe_id)
    {   
       
        $receitaAlimento = $request->all();
        
        $food_id = $receitaAlimento['alimento_id'];
        $alimentoExist = Alimento::find($food_id);

        if(isset($alimentoExist)) {
            $novoReceitaAlimento= ReceitaAlimento::create([
                "receita_id"=>$recipe_id,
                "alimento_id"=>$food_id
                ]);
            return $novoReceitaAlimento;
        }

        return response()->json("Alimento não encontrado.");

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $receitaId, $alimentoId)
    {   
        $body = $request->all();

        $alimento_to_change = ReceitaAlimento::all()->where('receita_id', $receitaId)->where('alimento_id', $alimentoId);
        $alimentoExist = Alimento::find($body['alimento_id']);

        if ($alimento_to_change == []) {
            return response()->json("Receita a ser atualizado não encontrado.");
        }

        if (isset($alimento_to_change)) {
            if(isset($alimentoExist)) {
                $alimento_to_change->first()->update($body);
                return $alimento_to_change;
            }
            return response()->json("Alimento a ser atualizado não encontrado.");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($receitaId, $alimentoId)
    {   
        $alimento_to_delete = ReceitaAlimento::all()->where('receita_id', $receitaId)->where('alimento_id', $alimentoId)->first();

       
        if (empty($alimento_to_delete)) {
            return response()->json("Receita a ser atualizado não encontrado.");
        }

        if (isset($alimento_to_delete)) {
            $id = $alimento_to_delete->id;
            $alimento_to_delete->destroy($id);
            return response()->json("Alimento deletado com sucesso.");
        }
        return response()->json("Alimento a ser atualizado não encontrado.");

    }
}
