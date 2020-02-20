<?php

use Illuminate\Database\Seeder;

class InvoicesSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('invoices')->delete();

        \DB::table('invoices')->insert(array (
          
        ));


    }
}
