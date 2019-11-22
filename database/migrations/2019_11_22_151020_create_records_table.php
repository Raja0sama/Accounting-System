<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('records', function(Blueprint $table)
		{
			$table->bigIncrements('id', true);
			$table->date('Date');
			$table->string('chartaccount', 50);
			$table->string('mainaccount', 50);
			$table->string('subaccount', 50);
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
		Schema::drop('records');
	}

}
