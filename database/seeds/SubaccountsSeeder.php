<?php

use Illuminate\Database\Seeder;

class SubaccountsSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('subaccounts')->delete();

        \DB::table('subaccounts')->insert(array (
            0 =>
            array (
                'accountid' => '1',
                'accountname' => 'Sami',
                'amount' => 0.0,
            ),
            2 =>
            array (
                'accountid' => '9',
                'accountname' => 'Cash',
                'amount' => 0.0,
            ),
            3 =>
            array (
                'accountid' => '10',
                'accountname' => 'Raju',
                'amount' => 0.0,
            ),
            4 =>
            array (
                'accountid' => '2',
                'accountname' => 'Web Dev',
                'amount' => 0.0,
            ),
        ));


    }
}
