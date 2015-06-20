<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMyProductToProductTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('my_product');
            $table->string('recommended_stock');
            $table->string('our_cost')->nullable();
            $table->string('prep_fees')->nullable();
            $table->string('shipping_cost')->nullable();
            $table->timestamp('first_order_date')->nullable();
            $table->timestamp('amazon_received_order_date')->nullable();
            $table->timestamp('next_order_date')->nullable();
            $table->timestamp('last_order_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('my_product');
            $table->dropColumn('recommended_stock');
            $table->dropColumn('our_cost');
            $table->dropColumn('prep_fees');
            $table->dropColumn('shipping_cost');
            $table->dropColumn('first_order_date');
            $table->dropColumn('amazon_received_order_date');
            $table->dropColumn('next_order_date');
            $table->dropColumn('last_order_date');
        });
    }

}
