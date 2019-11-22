<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceiptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receipts', function(Blueprint $table)
		{
			$table->bigIncrements('id', true);
			$table->date('Date')->nullable();
			$table->string('chartaccount', 50);
			$table->string('mainaccount', 50);
			$table->string('subaccount', 50);
			$table->string('subaccount1', 50);
			$table->string('subaccount2', 50);
			$table->string('subaccount3', 50);
			$table->string('subaccount4', 50);
			$table->string('subaccount5', 50);
			$table->string('subvalue', 50);
			$table->string('subvalue1', 50);
			$table->string('subvalue2', 50);
			$table->string('subvalue3', 50);
			$table->string('subvalue4', 50);
			$table->string('subvalue5', 50);
			$table->string('by', 50);
			$table->string('Description', 50);
            $table->integer('Total');
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
		Schema::drop('recipt');
	}

}
