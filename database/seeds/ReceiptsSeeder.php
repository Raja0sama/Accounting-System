<?php

use Illuminate\Database\Seeder;

class ReceiptsSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('receipts')->delete();

        \DB::table('receipts')->insert(array (
            0 =>
            array (
                'by' => 'Petty Cash',
                'chartaccount' => 'Assets',
                'Date' => '2018-08-09',
                'Description' => 'Cash received.',
                'mainaccount' => 'A/c Receivable ',
                'subaccount' => 'New Century ',
                'subaccount1' => '',
                'subaccount2' => '',
                'subaccount3' => '',
                'subaccount4' => '',
                'subaccount5' => '',
                'subvalue' => '62000',
                'subvalue1' => '',
                'subvalue2' => '',
                'subvalue3' => '',
                'subvalue4' => '',
                'subvalue5' => '',
                'Total' => 62000,
            ),
            1 =>
            array (
                'by' => 'Petty Cash',
                'chartaccount' => 'Assets',
                'Date' => '2018-08-09',
                'Description' => 'Cash Received',
                'mainaccount' => 'A/c Receivable ',
                'subaccount' => 'Najibullah-7',
                'subaccount1' => '',
                'subaccount2' => '',
                'subaccount3' => '',
                'subaccount4' => '',
                'subaccount5' => '',
                'subvalue' => '60000',
                'subvalue1' => '',
                'subvalue2' => '',
                'subvalue3' => '',
                'subvalue4' => '',
                'subvalue5' => '',
                'Total' => 60000,
            ),
            2 =>
            array (
                'by' => 'Petty Cash',
                'chartaccount' => 'Assets',
                'Date' => '2018-08-09',
                'Description' => '',
                'mainaccount' => 'A/c Receivable ',
                'subaccount' => 'Najibullah-7',
                'subaccount1' => '',
                'subaccount2' => '',
                'subaccount3' => '',
                'subaccount4' => '',
                'subaccount5' => '',
                'subvalue' => '60000',
                'subvalue1' => '',
                'subvalue2' => '',
                'subvalue3' => '',
                'subvalue4' => '',
                'subvalue5' => '',
                'Total' => 60000,
            ),
            3 =>
            array (
                'by' => 'Petty Cash',
                'chartaccount' => 'Assets',
                'Date' => '2018-08-09',
                'Description' => '',
                'mainaccount' => 'A/c Receivable ',
                'subaccount' => 'Najibullah-7',
                'subaccount1' => '',
                'subaccount2' => '',
                'subaccount3' => '',
                'subaccount4' => '',
                'subaccount5' => '',
                'subvalue' => '60000',
                'subvalue1' => '',
                'subvalue2' => '',
                'subvalue3' => '',
                'subvalue4' => '',
                'subvalue5' => '',
                'Total' => 60000,
            ),
            4 =>
            array (
                'by' => 'Petty Cash',
                'chartaccount' => 'Assets',
                'Date' => '2018-08-09',
                'Description' => '',
                'mainaccount' => 'A/c Receivable ',
                'subaccount' => 'Najibullah-7',
                'subaccount1' => '',
                'subaccount2' => '',
                'subaccount3' => '',
                'subaccount4' => '',
                'subaccount5' => '',
                'subvalue' => '10000',
                'subvalue1' => '',
                'subvalue2' => '',
                'subvalue3' => '',
                'subvalue4' => '',
                'subvalue5' => '',
                'Total' => 10000,
            ),
        ));


    }
}
