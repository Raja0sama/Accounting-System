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
            [
                'by' => 'sdbs',
                'chartaccount' => 'dvsdbv',
                'Description' => 'sdvs',
                'mainaccount' => 'sdb',
                'subaccount' => '',
                'Total' => 1000000,
            ],
            [
                'by' => 'sdfsd',
                'chartaccount' => 'dfg',
                'Date' => '2018-07-02',
                'Description' => 'sdf',
                'mainaccount' => 'sdvsd',
                'subaccount' => '',
                'Total' => 1000000,
            ],
            [
                'by' => 'sdv',
                'chartaccount' => 'dvs',
                'Date' => '2018-07-17',
                'Description' => 'sdvs',
                'mainaccount' => 'dfbs',
                'subaccount' => '',
                'Total' => 5000,
            ],
            [
                'by' => 'sdbs',
                'chartaccount' => 'sc',
                'Date' => '2018-07-11',
                'Description' => 'sc',
                'mainaccount' => 'asa',
                'subaccount' => '',
                'Total' => 1000000,
            ],
            [
                'by' => '1',
                'chartaccount' => '102',
                'Date' => '2018-07-10',
                'Description' => 'addw',
                'mainaccount' => '1',
                'subaccount' => '',
                'Total' => 600,
            ],
            [
                'by' => '2',
                'chartaccount' => '',
                'Date' => '2018-07-17',
                'Description' => 'dfbdf',
                'mainaccount' => '1',
                'subaccount' => '',
                'Total' => 600,
            ],
            [
                'by' => '1',
                'chartaccount' => '',
                'Description' => 'komp',
                'mainaccount' => '1',
                'subaccount' => '',
                'Total' => 600,
            ],
            [
                'by' => '2',
                'chartaccount' => '',
                'Date' => '2018-07-05',
                'Description' => 'hvj',
                'mainaccount' => '2',
                'subaccount' => '',
                'Total' => 221,
            ],
            [
                'by' => '2',
                'chartaccount' => '101',
                'Date' => '2018-07-05',
                'Description' => 'hvj',
                'mainaccount' => '2',
                'subaccount' => '',
                'Total' => 221,
            ],
            [
                'by' => '1',
                'chartaccount' => '101',
                'Description' => '',
                'mainaccount' => '1',
                'subaccount' => '',
                'Total' => 0,
            ],
            [
                'by' => '1',
                'chartaccount' => '101',
                'Description' => '',
                'mainaccount' => '1',
                'subaccount' => '',
                'Total' => 0,
            ],
            [
                'by' => '1',
                'chartaccount' => '101',
                'Description' => '',
                'mainaccount' => '1',
                'subaccount' => '',
                'Total' => 0,
            ],
            [
                'by' => '1',
                'chartaccount' => '101',
                'Description' => '',
                'mainaccount' => '1',
                'subaccount' => '',
                'Total' => 0,
            ],
            [
                'by' => '1',
                'chartaccount' => '101',
                'Description' => '',
                'mainaccount' => '1',
                'subaccount' => '',
                'Total' => 0,
            ],
            [
                'by' => '1',
                'chartaccount' => 'icons8-edit-24.png',
                'Description' => 'fg',
                'mainaccount' => '2',
                'subaccount' => '',
                'Total' => 522,
            ]
        ];
        foreach ($records as $record) {
            Record::create($record);
        }


    }
}
