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
            [
                'chartaccount' => 'Liabilities',
                'Date' => '2018-08-09',
                'Description' => 'paid to m.ali testing',
                'mainaccount' => 'Security Deposit',
                'subaccount1' => 'M.Ali',
                'subaccount2' => '',
                'subaccount3' => '',
                'subaccount4' => '',
                'subaccount5' => '',
                'subaccount6' => '',
                'subaccountvalue1' => '100',
                'subaccountvalue2' => '',
                'subaccountvalue3' => '',
                'subaccountvalue4' => '',
                'subaccountvalue5' => '',
                'subaccountvalue6' => '',
                'by' => 'Petty Cash',
                'Total' => 100,
            ],
        ]);


    }
}
