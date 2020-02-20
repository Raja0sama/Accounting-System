<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceiptsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->date('Date')->nullable();
            $table->string('chartaccount', 50);
            $table->string('mainaccount', 50);

            $table->string('by', 50);
            $table->string('Description', 255)->nullable();
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
        Schema::drop('receipts');
    }
}
