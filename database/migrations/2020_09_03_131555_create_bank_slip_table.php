<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankSlipTable extends Migration
{

    public function up()
    {
        Schema::create('bank_slip', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('address_id');
            $table->string('number', '10');
            $table->text('dividable');
            $table->date('due');
            $table->decimal('amount');
            $table->decimal('interest');
            $table->decimal('mulct');
            $table->decimal('discount');
            $table->text('link');
            $table->enum('status', ['pendent', 'overdue', 'payed', 'manually', 'canceled']);

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('bank_slip');
    }
}
