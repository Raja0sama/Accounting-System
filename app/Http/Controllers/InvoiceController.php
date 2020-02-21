<?php

namespace App\Http\Controllers;

use App\Account;
use App\Invoice;
use App\Payment;
use App\Sa;
use App\Subaccount;
use App\Chartaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\PaymentRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices=Invoice::all();
        // $invoices = Invoice::all
           
        return view('invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $a = "ac";
        return view('invoice.create');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function supplier_create()
    {
        $a = "sup";
        return view('invoice.screate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        $message = '';
        DB::transaction(function () use ($request, &$message) {
            $bill=Account::find($request->bill);
            $customer=Subaccount::find($request->Customer);
            $data = [
                'Date' => $request->datevalue,
                'Bill' => $bill->id,
                'Customer'  => $customer->subid,
                'description'  => $request->description,
            ];
            
            $sum = 0 ;
            for ($i = 1; $i <= 6; $i++) {
                $subaccount_id = $request["subvalue$i"];
                $amount = $request["value$i"];
                $subaccount = Subaccount::find($subaccount_id);
                if ($subaccount) {
                    
                    $sum += $amount;
                }
            }
            if($request->cust == "true"){

                $customer->transact(-$sum);  // This is opposite to PaymentController since this is a receipt
            }else{
                $customer->transact($sum);  // This is opposite to PaymentController since this is a receipt

            }
            // $bill->transact($sum);  // This is opposite to PaymentController since this is a receipt
            $data['Total'] = $sum;

            $invoice = Invoice::create($data);

            // This differs from CORE PHP implementation because it also updates corresponding ChartAccount !!!
            $invoice->transact();

            for ($i = 1; $i <= 6; $i++) {
                $subaccount_id = $request["subvalue$i"];
                $amount = $request["value$i"];
                $subaccount = Subaccount::find($subaccount_id);
                if ($subaccount) {
                    if($request->cust == "true"){

                        $subaccount->transact($amount);  // This is opposite to PaymentController since this is a receipt
                    }else{
                        $subaccount->transact(-$amount);  // This is opposite to PaymentController since this is a receipt
        
                    }

                    $id = $subaccount->subid;
                    $ammount = $amount;
                    $parentid = $invoice->id;
                
                   Sa::create([
                        'nameid' =>  $id,
                        'amount' => $ammount,
                        'parentid' => $parentid,
                        'from'=> 3
                    ]);

                }
            }
            $message = "Invoice created with id " . $invoice->id;
        });
        return redirect()->route('invoices.create')->with(compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $paymentz = Payment::find($id);
        

        $invoices = DB::table('invoices')
        ->leftJoin('subaccounts as c', 'invoices.Customer', '=', 'c.subid')
        ->leftJoin('subaccounts', 'invoices.subaccount1', '=', 'subaccounts.subid')
        ->leftJoin('subaccounts as w2', 'invoices.subaccount2', '=', 'w2.subid')
        ->leftJoin('subaccounts as w3', 'invoices.subaccount3', '=', 'w3.subid')
        ->leftJoin('subaccounts as w4', 'invoices.subaccount4', '=', 'w4.subid')
        ->leftJoin('subaccounts as w5', 'invoices.subaccount5', '=', 'w5.subid')
        ->leftJoin('subaccounts as w6', 'invoices.subaccount6', '=', 'w6.subid')
        ->select('invoices.*', 'subaccounts.accountname as subaccount1n',
        'c.accountname as Customer1',
        'w2.accountname as subaccount2n',
        'w3.accountname as subaccount3n',
        'w4.accountname as subaccount4n',
        'w5.accountname as subaccount5n',
        'w6.accountname as subaccount6n')
        ->where('invoices.id','=', $id)
        ->get();

        $invoice =  $invoices[0];
        // dd(json_encode($payment),json_encode($paymentz));
        // dd($payment);

        // dd($invoice);s
        return view('invoice.show', compact('invoice'));


        // $invoice = Invoice::find($id);
        // return view('invoice.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        
        return view('invoice.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        
        $message = '';
        DB::transaction(function () use ($request, $invoice, &$message) {
            // dd($request);
            // First Rollback current invoice transactions
            // $invoice->rollback();
            // dd( $request);
            // Now update invoice
            $bill=Account::find($request->bill);
            $customer=Subaccount::find($request->Customer);

            $data = [
                'Date' => $request->datevalue,
                'Bill' => $bill->id,
                'Customer'  => $customer->subid,
                'description'  => $request->description,
            ];
            
            $sum=0;
            for ($i = 0; $i <= 6; $i++) {
                $subaccount_id = $request["subvalue$i"];
                $amount = $request["value$i"];
                $subaccount = Subaccount::find($subaccount_id);
                if ($subaccount) {
                    $parentid = $invoice->id;

                    // dd($amount);
                    $subaccount->transact(Sa::where('parentid',$parentid)->sum('amount'));  // This is opposite to PaymentController since this is a receipt
                    $subaccount->transact(-$amount);  // This is opposite to PaymentController since this is a receipt

                    // $data["subaccount$i"] = $subaccount->subid;
                    // $data["subaccountvalue$i"] = $amount;
                    $sum += $amount;
                    $id = $subaccount->subid;
                    $ammount = $amount;
                    $parentid = $invoice->id;
                    Sa::where('parentid',$parentid)->delete();
                    Sa::create([
                        'nameid' =>  $id,
                        'amount' => $ammount,
                        'parentid' => $parentid,
                        'from'=> 3
                    ]);
                    
                }
            }

            $customer->transact(-$invoice->Total);
            $customer->transact(+$sum);

       

            $data['Total'] = $sum;
            $invoice->update($data);
            
            // and apply new values
            // $invoice->transact();

            $message="Invoice with id " . $invoice->id . " was updated";
        });
        return redirect()->route('invoices.index')->with(compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Invoice $invoice)
    {
        $message = '';
        
        DB::transaction(function () use ($request,$invoice, &$message) {
            // Reverse amounts
            $invoice->rollback();
            $id=$invoice->id;
            //first find take a sum of the all the SA realted to current invoice
            $sub = $invoice->Total;

            
            $customer=Subaccount::find($invoice->Customer);
            if($request->cust == "true"){
                $customer->transact($sub);
            }else{
                $customer->transact(-$sub);

            }

            //delete all the Sa related to current invoice 
            foreach(Sa::where([['parentid','=',$id],['from','=',3]])->get() as $item){
                $sub = Subaccount::find($item->nameId);
                if($request->cust == "true"){
                    $sub->transact(-(int)$item->amount);
                }else{

                    $sub->transact((int)$item->amount);
                }
               $sub->delete();
          
            }



           

            $invoice->delete();
            $message="Invoice with id $id was deleted";
        });
        return redirect()->route('invoices.index')->with(compact('message'));
    }
}
