<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRafflesTable extends Migration
{

    public function up()
    {
        Schema::create('raffles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_id');
            $table->string('name', 191);
            $table->date('end');
            $table->text('description');

            $table->softDeletes();
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
        Schema::dropIfExists('raffles');
    }
}
