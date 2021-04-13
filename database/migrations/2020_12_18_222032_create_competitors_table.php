<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitorsTable extends Migration
{

    public function up()
    {
        Schema::create('competitors', function (Blueprint $table) {
            $table->id();
            $table->integer('promotion_id');
            $table->string('name');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('response')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('competitors');
    }
}
