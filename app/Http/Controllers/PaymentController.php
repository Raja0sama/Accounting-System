<?php

namespace App\Http\Controllers;

use App\Account;
use App\Payment;
use App\Subaccount;
use App\Chartaccount;
use App\Sa;
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
        $payments=Payment::all();
      
    ;
            return view('payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentRequest $request)
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
            // dd($request->byvalue);
            $data = [
                'Date' => $request->datevalue,
                'chartaccount' => $chart->id,
                'mainaccount'  => $account->id,
                'description'  => $request->description,
                'by' => $by->accountname,
                'Total' => $sum,
            ];
        
            

                $by->transact(-$sum);
           
            
            $payment = Payment::create($data);
        


            for ($i = 1; $i <= 6; $i++) {
                $subaccount_id = $request["subvalue$i"];
                $amount = $request["value$i"];
                $subaccount = Subaccount::find($subaccount_id);
                if ($subaccount) {
                         $subaccount->transact($amount);

                    // if($chart->id == 1 || $chart->id == 4){
                        //     $subaccount->transact($amount);
                    // }
                    // if($chart->id == 2 || $chart->id == 3 || $chart->id == 5){
                    //     $subaccount->transact(-$amount);
                    // }
                    $id = $subaccount->subid;
                    $ammount = $amount;
                    $parentid = $payment->id;
                
                   Sa::create([
                        'nameid' =>  $id,
                        'amount' => $ammount,
                        'parentid' => $parentid,
                        'from'=> 1
                    ]);

                }
            }
            $message = "Payment created with id " . $payment->id;
        });
        return redirect()->route('payments.create')->with(compact('message'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::find($id);
        
    
        return view('payment.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
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
