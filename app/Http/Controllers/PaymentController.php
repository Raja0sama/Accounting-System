<?php

namespace App\Http\Controllers;

use App\Account;
use App\Payment;
use Carbon\Carbon;
use App\Subaccount;
use App\Chartaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'con' => dbconnection(),
            'payments' => Payment::all(),
        ];
        return view('payment_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('payment_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
    {

        // on Payment upload we :

        // WITHIN a DB::transaction ! {

        // Validate that we have date, VALID chart, VALID main and at least one VALID sub and ammount pair
        // calculate sum of subvalues

        // and If Chart==1 or 4
        //     add sum to balance of chart
        //     add sum to balance of main
        //     add corresponding value to each subaccount balance

        // if Chart==2 or 3 or 5
        //     subtract as above

        // in all cases subtract from account with ID = byvalue (alwayd 6 - always Petty cash)

        // get name of account with id byvalue (we will use it to update by field)

        // create new payment

        // return for more (send flash message with new payment ID )
        // }
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
                    $subaccount->transact($amount);
                    $data["subaccount$i"] = $subaccount->accountname;
                    $data["subaccountvalue$i"] = $amount;
                }
            }
            $by->transact(-$sum, false);
            $payment = Payment::create($data);
            $message = "Payment saved with id " . $payment->id;
        });
        return redirect()->route('payments.create')->with(compact('message'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
