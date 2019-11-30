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
            $table->string('subaccount1', 50)->nullable();
            $table->string('subaccount2', 50)->nullable();
            $table->string('subaccount3', 50)->nullable();
            $table->string('subaccount4', 50)->nullable();
            $table->string('subaccount5', 50)->nullable();
            $table->string('subaccount6', 50)->nullable();
            $table->string('subaccountvalue1', 50)->nullable();
            $table->string('subaccountvalue2', 50)->nullable();
            $table->string('subaccountvalue3', 50)->nullable();
            $table->string('subaccountvalue4', 50)->nullable();
            $table->string('subaccountvalue5', 50)->nullable();
            $table->string('subaccountvalue6', 50)->nullable();
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
