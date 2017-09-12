<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRequesttypeToRequestErransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_errans', function (Blueprint $table) {
            //
             $table->integer('requesttype')->after('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_errans', function (Blueprint $table) {
            //
                $table->integer('requesttype');
        });
    }
}
