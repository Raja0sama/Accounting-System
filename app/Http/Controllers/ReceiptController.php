<?php

namespace App\Http\Controllers;

use App\Account;
use App\Receipt;
use App\Subaccount;
use App\Sa;
use App\Chartaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReceiptRequest;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts=Receipt::all();
        return view('receipt.index', compact('receipts'));

    //     $receipts = DB::table('receipts')
    //     ->leftJoin('chartaccounts', 'receipts.chartaccount', '=', 'chartaccounts.id')
    //     ->leftJoin('accounts as name', 'receipts.mainaccount', '=', 'name.id')
    //     ->leftJoin('subaccounts', 'receipts.subaccount1', '=', 'subaccounts.subid')
    //     ->leftJoin('subaccounts as w2', 'receipts.subaccount2', '=', 'w2.subid')
    //     ->leftJoin('subaccounts as w3', 'receipts.subaccount3', '=', 'w3.subid')
    //     ->leftJoin('subaccounts as w4', 'receipts.subaccount4', '=', 'w4.subid')
    //     ->leftJoin('subaccounts as w5', 'receipts.subaccount5', '=', 'w5.subid')
    //     ->leftJoin('subaccounts as w6', 'receipts.subaccount6', '=', 'w6.subid')
    //     ->select('receipts.*', 'subaccounts.accountname as subaccount1n',
    //     'name.name as name',
    //     'chartaccounts.accountname as chartaccountn',
    //     'w2.accountname as subaccount2n',
    //     'w3.accountname as subaccount3n',
    //     'w4.accountname as subaccount4n',
    //     'w5.accountname as subaccount5n',
    //     'w6.accountname as subaccount6n')
    //     ->get();
    // return view('receipt.index', compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('receipt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiptRequest $request)
    {
        $message = '';

        DB::transaction(function () use ($request, &$message) {
            $sum = 0 + $request->value1;
            $sum += $request->value2;
            $sum += $request->value3;
            $sum += $request->value4;
            $sum += $request->value5;
            $sum += $request->value6;
            $chart = Chartaccount::find($request->chartvalue);
            $account = Account::find($request->mainvalue);
            $by = Subaccount::find($request->byvalue);
            $data = [
                'Date' => $request->datevalue,
                'chartaccount' => $chart->id,
                'mainaccount'  => $account->id,
                'description'  => $request->description,
                'by' => $by->accountname,
                'Total' => $sum,
            ];
            // for ($i = 1; $i <= 6; $i++) {
            //     $subaccount_id = $request["subvalue$i"];
            //     $amount = $request["value$i"];
            //     $subaccount = Subaccount::find($subaccount_id);
            //     if ($subaccount) {

            //         if($chart->id == 1 || $chart->id == 4){
            //             $subaccount->transact(- $amount);  // This is opposite to PaymentController since this is a receipt
            //         }
            //         if($chart->id == 2 || $chart->id == 3 || $chart->id == 5){
            //         $subaccount->transact( $amount);  // This is opposite to PaymentController since this is a receipt
            //         }
            //         $data["subaccount$i"] = $subaccount->subid;
            //         $data["subaccountvalue$i"] = $amount;
            //     }
            // }
            if($chart->id == 1 || $chart->id == 4){
                $by->transact( $sum,false);  // This is opposite to PaymentController since this is a receipt
            }
            if($chart->id == 2 || $chart->id == 3 || $chart->id == 5){
                $by->transact(-$sum,false);  // This is opposite to PaymentController since this is a receipt
            }
            $receipt = Receipt::create($data);
            for ($i = 1; $i <= 6; $i++) {
                $subaccount_id = $request["subvalue$i"];
                $amount = $request["value$i"];
                $subaccount = Subaccount::find($subaccount_id);
                if ($subaccount) {
                    if($chart->id == 1 || $chart->id == 4){
                        $subaccount->transact(-$amount);
                        
                    }
                    if($chart->id == 2 || $chart->id == 3 || $chart->id == 5){
                        $subaccount->transact($amount);
                    }
                    $id = $subaccount->subid;
                    $ammount = $amount;
                    $parentid = $receipt->id;
                
                   Sa::create([
                        'nameid' =>  $id,
                        'amount' => $ammount,
                        'parentid' => $parentid,
                        'from'=> 2
                    ]);

                }
            }
            $message = "Receipt saved with id " . $receipt->id;
        });
        return redirect()->route('receipts.create')->with(compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $receipt =  Receipt::find($id);
    
        return view('receipt.show', compact('receipt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receipt  $receipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receipt $receipt)
    {
        //
    }
}
