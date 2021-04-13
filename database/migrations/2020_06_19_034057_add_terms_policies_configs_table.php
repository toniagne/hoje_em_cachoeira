<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTermsPoliciesConfigsTable extends Migration
{

    public function up()
    {
        Schema::table('configs', function (Blueprint $table) {
            $table->string('terms')->after('title');
            $table->string('policies')->after('terms');
        });
    }


    public function down()
    {
        Schema::table('configs', function (Blueprint $table) {
            $table->dropColumn('terms');
            $table->dropColumn('policies');
        });
    }
}
