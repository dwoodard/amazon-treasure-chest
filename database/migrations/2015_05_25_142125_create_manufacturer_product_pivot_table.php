<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturerProductPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturer_product', function(Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->integer('manufacturer_id')->unsigned();
//            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');

            $table->integer('product_id')->unsigned();
//            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('manufacturer_product');
    }
}
