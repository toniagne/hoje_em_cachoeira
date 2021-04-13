<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcommerceCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('ecommerce_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('client_id');
            $table->string('name', 191);

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
        Schema::dropIfExists('ecommerce_categories');
    }
}
