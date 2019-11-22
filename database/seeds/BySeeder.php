<?php

use Illuminate\Database\Seeder;

class BySeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('by')->delete();

        \DB::table('by')->insert(array (
            0 =>
            array (
                'accountid' => 0,
                'accountname' => '',
                'chartid' => 1,
            ),
        ));


    }
}
