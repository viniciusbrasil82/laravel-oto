<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all(['id','title','description']);
        return response()->json($clientes);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = Cliente::create($request->post());
        return response()->json([
            'message'=>'Cliente Created Successfully!!',
            'cliente'=>$cliente
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return response()->json($cliente);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->fill($request->post())->save();
        return response()->json([
            'message'=>'Cliente Updated Successfully!!',
            'cliente'=>$cliente
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illelete();
        return response()->json([
            'message'=>'Cliente Deleted Successfully!!'
        ]);
    }

    public function listar()
    {
        $Cliente = Cliente::all();
        return $Cliente;
    }uminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json([
            'message'=>'Cliente Deleted Successfully!!'
        ]);
    }

    public function listar()
    {
        $Cliente = Cliente::all();
        return $Cliente;
    }
}
