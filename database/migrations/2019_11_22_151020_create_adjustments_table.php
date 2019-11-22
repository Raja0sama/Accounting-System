<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdjustmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adjustments', function(Blueprint $table)
		{
			$table->bigIncrements('id', true);
			$table->date('date');
			$table->string('chartaccount', 50);
			$table->string('MainAccount', 50);
			$table->string('subaccount', 50);
			$table->float('amount', 10, 0);
			$table->string('chartaccount1', 50);
			$table->string('MainAccount1', 50);
			$table->string('subaccount1', 50);
			$table->float('amount1', 10, 0);
            $table->string('description', 100);
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
		Schema::drop('adjustments');
	}

}
