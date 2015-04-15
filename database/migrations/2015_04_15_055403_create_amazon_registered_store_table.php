<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmazonRegisteredStoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('amazon_registered_store', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('user_id');
			$table->string('url');
			$table->string('logo');
			$table->string('ein');
			$table->timestamp('established_date');
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
		Schema::drop('amazon_registered_store');
	}

}
