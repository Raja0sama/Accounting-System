<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->bigIncrements('id', true);
			$table->date('Date');
			$table->string('chartaccount', 50);
			$table->string('mainaccount', 50);
			$table->string('subaccount', 50);
			$table->string('subaccount1', 50);
			$table->string('subaccount2', 50);
			$table->string('subaccount3', 50);
			$table->string('subaccount4', 50);
			$table->string('subaccount5', 50);
			$table->string('subaccountvalue', 50);
			$table->string('subaccountvalue1', 50);
			$table->string('subaccountvalue2', 50);
			$table->string('subaccountvalue3', 50);
			$table->string('subaccountvalue4', 50);
			$table->string('subaccountvalue5', 50);
			$table->string('by', 50);
			$table->string('Description', 50);
			$table->integer('Total');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payments');
	}

}
