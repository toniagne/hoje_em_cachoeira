<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHasProductsTable extends Migration
{

    public function up()
    {
        Schema::create('order_has_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('product_id');
            $table->double('value', 18,2);
            $table->integer('qtd');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('order_has_products');
    }
}
