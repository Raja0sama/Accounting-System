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
         
        ];

        foreach ($receipts as $receipt) {
            Receipt::create($receipt);
        }
    }
}
