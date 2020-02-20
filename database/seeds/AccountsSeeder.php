<?php

use Illuminate\Database\Seeder;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('accounts')->delete();

        \DB::table('accounts')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'A/c Receivable ',
                'amount' => 0,
                'chartid' => '1',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Income',
                'amount' => 0,
                'chartid' => '5',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Security Deposit',
                'amount' => 0,
                'chartid' => '2',
            ),
            3 =>
            array (
                'id' => 6,
                'name' => 'Petty Cash',
                'amount' => 0,
                'chartid' => '1',
            ),
            4 =>
            array (
                'id' => 7,
                'name' => 'Director Expense',
                'amount' => 0.0,
                'chartid' => '4',
            ),
            5 =>
            array (
                'id' => 8,
                'name' => 'capital',
                'amount' => 0.0,
                'chartid' => '3',
            ),
            6 =>
            array (
                'id' => 9,
                'name' => 'Cash and Bank',
                'amount' => 0.0,
                'chartid' => '1',
            ),
            7 =>
            array (
                'id' => 10,
                'name' => 'Supplier',
                'amount' => 0.0,
                'chartid' => '2',
            ),
            8 =>
            array (
                'id' => 11,
                'name' => 'Purchases',
                'amount' => 0.0,
                'chartid' => '4',
            ),
        ));


    }
}
