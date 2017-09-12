<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBrandToAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agents', function (Blueprint $table) {
            //
            $table->string('brandname')->nullable()->after('name');
            $table->string('goodstype')->nullable()->after('lga_id');
            $table->string('tvpm')->nullable()->after('lga_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agents', function (Blueprint $table) {
            //
               $table->string('brandname');
            $table->string('goodstype');
            $table->string('tvpm');
        });
    }
}
