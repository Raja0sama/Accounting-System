<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubaccountsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subaccounts', function (Blueprint $table) {
            $table->bigIncrements('subid', true);
            $table->string('accountname', 50);
            $table->float('amount', 10, 0)->default(0);
            $table->string('accountid', 30);
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
        Schema::drop('subaccounts');
    }
}
