<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Produto;
use App\Models\Pedido;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Produto::class);
            $table->foreignIdFor(Pedido::class);
            $table->float('valor_venda');
            $table->integer('status');       
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_pedidos');
    }
};
