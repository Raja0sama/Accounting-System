<?php

use Illuminate\Database\Seeder;

class ChartaccountSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('chartaccount')->delete();

        \DB::table('chartaccount')->insert(array (
            0 =>
            array (
                'accountname' => 'Assets',
                'amount' => -252000.0,
                'chartid' => '1',
                'type' => 'D'
            ),
            1 =>
            array (
                'accountname' => 'Liabilities',
                'amount' => -100.0,
                'chartid' => '2',
                'type' => 'C'
            ),
            2 =>
            array (
                'accountname' => 'Expense',
                'amount' => 0.0,
                'chartid' => '4',
                'type' => 'D'
            ),
            3 =>
            array (
                'accountname' => 'Revenue',
                'amount' => 0.0,
                'chartid' => '5',
                'type' => 'C'
            ),
            4 =>
            array (
                'accountname' => 'Owners Equity',
                'amount' => 0.0,
                'chartid' => '3',
                'type' => 'C'
            ),
        ));


    }
}
