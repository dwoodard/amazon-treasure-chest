<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('tracker', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('ip');
            $table->string('region');
            $table->string('asin');
            $table->string('price');
            $table->string('sellerId');
            $table->integer('stock');
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
		Schema::drop('tracker');
	}

}
