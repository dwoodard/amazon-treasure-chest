<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseReceiptPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expense_receipt', function(Blueprint $table)
		{
			$table->integer('expense_id')->unsigned()->index();
			$table->foreign('expense_id')->references('id')->on('expenses')->onDelete('cascade');
			$table->integer('receipt_id')->unsigned()->index();
			$table->foreign('receipt_id')->references('id')->on('receipts')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('expense_receipt');
	}

}
