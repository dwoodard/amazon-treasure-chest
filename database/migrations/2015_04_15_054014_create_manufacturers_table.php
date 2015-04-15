<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('manufacturers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('company');
			$table->string('contact_person');
			$table->string('email');
			$table->string('phone');
			$table->string('address');
			$table->string('website');
			$table->boolean('contacted');
			$table->boolean('status');
			$table->boolean('no_amazon');
			$table->text('notes');

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
		Schema::drop('manufacturers');
	}

}
