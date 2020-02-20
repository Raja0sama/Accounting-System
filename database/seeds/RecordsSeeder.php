<?php

use App\Record;
use Illuminate\Database\Seeder;

class RecordsSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('records')->delete();

        $records=[
          
        ];
        foreach ($records as $record) {
            Record::create($record);
        }


    }
}
