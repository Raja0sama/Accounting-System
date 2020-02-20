<?php

use App\Chartaccount;
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
        $chartAccounts = [
            [
                'accountname' => 'Assets',
                'amount' => 0,
                'chartid' => '1',
                'type' => 'D'
            ],
            [
                'accountname' => 'Liabilities',
                'amount' => 0,
                'chartid' => '2',
                'type' => 'C'
            ],
            [
                'accountname' => 'Owners Equity',
                'amount' => 0.0,
                'chartid' => '3',
                'type' => 'C'
            ],
            [
                'accountname' => 'Expense',
                'amount' => 0.0,
                'chartid' => '4',
                'type' => 'D'
            ],
            [
                'accountname' => 'Revenue',
                'amount' => 0.0,
                'chartid' => '5',
                'type' => 'C'
            ],
        ];
        Chartaccount::truncate();
        foreach ($chartAccounts as $chartAccount) {
            Chartaccount::create($chartAccount);
        }
    }
}
