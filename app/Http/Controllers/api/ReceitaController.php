<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Alimento;
use App\Models\Receita;
use Illuminate\Http\Request;
use App\Models\ReceitaAlimento;

use function PHPSTORM_META\map;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receita = Receita::all();
        
        return $receita;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receita = $request->all();
        
        $novaReceita = Receita::create($receita);

        return $novaReceita;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receita = Receita::find($id);
        $alimentosDaReceita = ReceitaAlimento::all()->where('receita_id', $id);
       
        // Retorna um array com o id dos alimentos cadastrados na receita.
        $alimentos_id = [];
        // Retorna um array com o nome dos alimentos cadastrados na receita.
        $alimentos_nome = [];

        foreach ($alimentosDaReceita as $alimentos) {
            $alimentosID = $alimentos->alimento_id;
            array_push($alimentos_id, $alimentosID);
            
            $alimentos = Alimento::find($alimentosID)->toArray();
            array_push($alimentos_nome, $alimentos['nome']);
        }

        if($receita and $alimentosDaReceita) {
            return [
                'receita_id'=> $receita->id,
                'receita_nome'=> $receita->nome,
                'valor'=>$receita->valor,
                'alimentos'=>$alimentos_nome,
                'cadastro'=>$receita->created_at,
                'ultima_atualizacao'=> $receita->updated_at
            ];
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
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $receita = Receita::find($id);

        $receita->update($data);

        return $receita;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receita = Receita::find($id);

        if (isset($receita)) {
            Receita::destroy($id);

            return response()->json("Receita excluído com sucesso.");
        }
        
        return response()->json("Receita não encontrado.");
    }
}
