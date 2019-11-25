<?php

use App\Receipt;
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

        Receipt::truncate();

        $receipts=[
            [
                'by' => 'Petty Cash',
                'chartaccount' => 'Assets',
                'Date' => '2018-08-09',
                'Description' => 'Cash received.',
                'mainaccount' => 'A/c Receivable ',
                'subaccount1' => 'New Century ',
                'subaccountvalue1' => '62000',
                'Total' => 62000,
            ],
            [
                'by' => 'Petty Cash',
                'chartaccount' => 'Assets',
                'Date' => '2018-08-09',
                'Description' => 'Cash Received',
                'mainaccount' => 'A/c Receivable ',
                'subaccount1' => 'Najibullah-7',
                'subaccountvalue1' => '60000',
                'Total' => 60000,
            ],
            [
                'by' => 'Petty Cash',
                'chartaccount' => 'Assets',
                'Date' => '2018-08-09',
                'Description' => '',
                'mainaccount' => 'A/c Receivable ',
                'subaccount1' => 'Najibullah-7',
                'subaccountvalue1' => '60000',
                'Total' => 60000,
            ],
            [
                'by' => 'Petty Cash',
                'chartaccount' => 'Assets',
                'Date' => '2018-08-09',
                'Description' => '',
                'mainaccount' => 'A/c Receivable ',
                'subaccount1' => 'Najibullah-7',
                'subaccountvalue1' => '60000',
                'Total' => 60000,
            ],
            [
                'by' => 'Petty Cash',
                'chartaccount' => 'Assets',
                'Date' => '2018-08-09',
                'Description' => '',
                'mainaccount' => 'A/c Receivable ',
                'subaccount1' => 'Najibullah-7',
                'subaccountvalue1' => '10000',
                'Total' => 10000,
            ],
        ];

        foreach ($receipts as $receipt) {
            Receipt::create($receipt);
        }
    }
}
