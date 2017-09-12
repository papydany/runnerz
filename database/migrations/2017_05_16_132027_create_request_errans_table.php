<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestErransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_errans', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('state_id');
            $table->string('lga_id');
            $table->integer('personality');
            $table->integer('status');
            $table->string('address');
            $table->string('detail')->nullable();
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
        Schema::drop('request_errans');
    }
}
