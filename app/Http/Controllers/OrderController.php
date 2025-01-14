<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido as Order;
use App\Models\Produto;
use App\Models\ProdutoPedido;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Route::get('/orders', 'index');
    public function index()
    {
        return Order::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    //Route::post('/orders', 'create');        
    public function create(Request $request)
    {
        //Auth::id()
        
        $data = $request->post();
        $order = new Order;
        $order->valor_frete = $data['valor_frete'];
        $order->valor_total = $data['valor_frete'];
        $order->status = 1;
        $order->user_id = Auth::id();
        $order->save();
        $total = 0;
        foreach($data['products'] as $prod_item)
        {
            $prod = Produto::find($prod_item['id']);
            //dd($prod);
            $total+=$prod->valor;

            $pd = ProdutoPedido::create([
                'valor_venda' => $prod->valor,
                'status' => 1,
                'produto_id' => $prod_item['id'],
                'pedido_id' => $order->id,
            ]);
       
        }
        if($total > 0){
            $order->valor_total = $total;
            $order->save();
            return response()->json([
                'message'=>'Order Created Successfully!!',
                'order'=>$order
            ]);            
        } else {
            return response()->json([
                'message'=>'Error!!']);            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Route::get('/orders/{id}', 'show');
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
    public function edit(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = $request->status;
        return response()->json([
            'message'=>'Order Updated Successfully!!',
            'produto'=>$order
        ]);        
    }    

    public function updtstatus(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = $request->status;
        $order->save();
        return response()->json([
            'message'=>'Order Updated Successfully!!',
            'produto'=>$order
        ]);        
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
