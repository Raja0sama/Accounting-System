<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('Date');
            $table->string('Bill', 50);
            $table->string('Customer', 50);
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
