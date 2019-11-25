<?php

namespace App\Http\Controllers;

use App\Account;
use App\Receipt;
use App\Subaccount;
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
        return view('receipt_index', compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('receipt_create');
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
            $sum = 0 + $request->input('value1');
            $sum += $request->input('value2');
            $sum += $request->input('value3');
            $sum += $request->input('value4');
            $sum += $request->input('value5');
            $sum += $request->input('value6');
            $chart = Chartaccount::find($request->input('chartvalue'));
            $account = Account::find($request->input('mainvalue'));
            $by = Account::find($request->input('byvalue'));
            $data = [
                'Date' => $request->input('datevalue'),
                'chartaccount' => $chart->accountname,
                'mainaccount'  => $account->name,
                'description'  => $request->input('description'),
                'by' => $by->name,
                'Total' => $sum,
            ];
            for ($i = 1; $i <= 6; $i++) {
                $subaccount_id = $request->input('subvalue' . $i);
                $amount = $request->input('value' . $i);
                $subaccount = Subaccount::find($subaccount_id);
                if ($subaccount) {
                    $subaccount->transact(- $amount);  // This is opposite to PaymentController since this is a receipt
                    $data["subaccount$i"] = $subaccount->accountname;
                    $data["subaccountvalue$i"] = $amount;
                }
            }
            $by->transact($sum, false); // This is opposite to PaymentController since this is a receipt
            $receipt = Receipt::create($data);
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
    public function show(Receipt $receipt)
    {
        return view('receipt_show', compact('receipt'));
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
