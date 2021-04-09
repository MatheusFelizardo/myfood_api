<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pedido;
use App\Models\Receita;
use App\Models\ReceitasPedido;

class ReceitasPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $receita = Receita::find($id);
        $receitasDoPedido = ReceitasPedido::all()->where('receita_id', $id);
       
        // Retorna um array com o id das receitas cadastrados no pedido.
        $receitas_id = [];
        // Retorna um array com o nome dos receitas cadastrados na receita.
        $receitas_items = [];

        foreach ($receitasDoPedido as $receitas) {
            $receitasID = $receitas->receita_id;
            array_push($receitas_id, $receitasID);
            
            $receitas = Receita::find($receitasID)->toArray();
            array_push($receitas_items, $receitas);
        }

        if($receita and $receitasDoPedido) {
            return [
                'receita_id'=> $receita->id,
                'receita'=> $receita->nome,
                'receita'=> $receita->valor,
                'receitas'=>$receitas_items
            ];
        }

        if($receita and !$receitasDoPedido) {
            return response()->json("Receita sem receitas cadastrados.");
        }

        return response()->json("Receita não encontrada.");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pedido_id)
    {
        $receitaPedido = $request->all();
        
        $receita_id = $receitaPedido['receita_id'];
        $receitaExist = Receita::find($receita_id);

        if(isset($receitaExist)) {
            $novoReceitaPedido= ReceitasPedido::create([
                "pedido_id"=>$pedido_id,
                "receita_id"=>$receita_id
                ]);
            return $novoReceitaPedido;
        }

        return response()->json("Receita não encontrado.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
