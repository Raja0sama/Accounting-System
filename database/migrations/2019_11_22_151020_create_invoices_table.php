<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoices', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('Date');
			$table->string('Bill', 50);
			$table->string('Customer', 50);
			$table->string('subaccount', 50);
			$table->string('subaccount1', 50);
			$table->string('subaccount2', 50);
			$table->string('subaccount3', 50);
			$table->string('subaccount4', 50);
			$table->string('subaccount5', 50);
			$table->float('amountvalue', 10, 0);
			$table->float('amountvalue1', 10, 0);
			$table->float('amountvalue2', 10, 0);
			$table->float('amountvalue3', 10, 0);
			$table->float('amountvalue4', 10, 0);
			$table->float('amountvalue5', 10, 0);
			$table->string('Description', 500);
            $table->float('Total', 10, 0);
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
		Schema::drop('invoices');
	}

}
