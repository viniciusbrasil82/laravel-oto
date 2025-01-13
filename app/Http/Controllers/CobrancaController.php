<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cobranca;

class CobrancaController extends Controller
{

    public function index()
    {
        $cobrancas = Cobranca::all(['id','title','description']);
        return response()->json($cobrancas);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cobranca = Cobranca::create($request->post());
        return response()->json([
            'message'=>'Cobranca Created Successfully!!',
            'cobranca'=>$cobranca
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cobranca  $cobranca
     * @return \Illuminate\Http\Response
     */
    public function show(Cobranca $cobranca)
    {
        return response()->json($cobranca);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cobranca  $cobranca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cobranca $cobranca)
    {
        $cobranca->fill($request->post())->save();
        return response()->json([
            'message'=>'Cobranca Updated Successfully!!',
            'cobranca'=>$cobranca
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cobranca  $cobranca
     * @return \Illelete();
        return response()->json([
            'message'=>'Cobranca Deleted Successfully!!'
        ]);
    }

    public function listar()
    {
        $Cobranca = Cobranca::all();
        return $Cobranca;
    }uminate\Http\Response
     */
    public function destroy(Cobranca $cobranca)
    {
        $cobranca->delete();
        return response()->json([
            'message'=>'Cobranca Deleted Successfully!!'
        ]);
    }

    public function listar()
    {
        $Cobranca = Cobranca::all();
        return $Cobranca;
    }

}