<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{

    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('bill_entry_id');
            $table->string('nossonumero');
            $table->string('id_unico');
            $table->string('banco_numero');
            $table->string('token_facilitador');
            $table->string('credencial');
            $table->string('linkBoleto');
            $table->string('linkGrupo');
            $table->string('linhaDigitavel');
            $table->string('pedido_numero');
            $table->enum('situation', ['pendent', 'payed'])->default('pendent');

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
