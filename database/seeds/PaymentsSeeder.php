<?php

use Illuminate\Database\Seeder;

class PaymentsSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('payments')->delete();

        \DB::table('payments')->insert( [
         
        ]);


    }
}
