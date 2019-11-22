<?php

use Illuminate\Database\Seeder;

class AdjustmentsSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('adjustments')->delete();

        \DB::table('adjustments')->insert(array (
            0 =>
            array (
                'amount' => 100000000.0,
                'amount1' => 100000000.0,
                'chartaccount' => 'Assets',
                'chartaccount1' => 'Assets',
                'date' => '2018-08-09',
                'description' => 'testing',
                'MainAccount' => 'A/c Receivable ',
                'MainAccount1' => 'Security Deposit',
                'subaccount' => 'M.Ali',
                'subaccount1' => 'M.Ali',
            ),
            1 =>
            array (
                'amount' => 100000000.0,
                'amount1' => 100000000.0,
                'chartaccount' => 'Liabilities',
                'chartaccount1' => 'Liabilities',
                'date' => '2018-08-09',
                'description' => 'testing',
                'MainAccount' => 'Security Deposit',
                'MainAccount1' => 'A/c Receivable ',
                'subaccount' => 'M.Ali',
                'subaccount1' => 'M.Ali',
            ),
        ));


    }
}
