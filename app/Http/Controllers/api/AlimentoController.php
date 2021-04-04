<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Alimento;
use Illuminate\Http\Request;

class AlimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $alimento = Alimento::all();

        return $alimento;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alimento = $request->all();
        
        $newAlimento = Alimento::create($alimento);

        return $newAlimento;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alimento = Alimento::find($id);

        if($alimento) {
            return $alimento;
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

        $alimento = Alimento::find($id);

        $alimento->update($data);

        return $alimento;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alimento = Alimento::find($id);

        if (isset($alimento)) {
            Alimento::destroy($id);

            return response()->json("Alimento excluído com sucesso.");
        }
        
        return response()->json("Alimento não encontrado.");
    }
}
