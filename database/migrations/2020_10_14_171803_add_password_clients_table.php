<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordClientsTable extends Migration
{

    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->timestamp('email_verified_at')->after('email')->nullable();
            $table->string('password')->after('services');
            $table->rememberToken();
        });
    }

    public function down()
    {
        //
    }
}
