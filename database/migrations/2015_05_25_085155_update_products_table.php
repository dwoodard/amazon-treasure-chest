<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('products', function(Blueprint $table)
        {
            $table->text('notes');
            $table->integer('manufacturer_id')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('products', function(Blueprint $table)
        {
            $table->dropColumn('notes');
            $table->dropColumn('manufacturer_id');
        });
	}

}
