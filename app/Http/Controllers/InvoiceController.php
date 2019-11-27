<?php

namespace App\Http\Controllers;

use App\Account;
use App\Invoice;
use App\Payment;
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
        return view('invoice_index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoice_create');
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
                'Bill' => $bill->name,
                'Customer'  => $customer->accountname,
                'description'  => $request->description,
            ];

            $sum = 0 ;
            for ($i = 1; $i <= 6; $i++) {
                $subaccount_id = $request["subvalue$i"];
                $amount = $request["value$i"];
                $subaccount = Subaccount::find($subaccount_id);
                if ($subaccount) {
                    $data["subaccount$i"] = $subaccount->accountname;
                    $data["subaccountvalue$i"] = $amount;
                    $sum += $amount;
                }
            }
            $data['Total'] = $sum;

            $invoice = Invoice::create($data);

            // This differs from CORE PHP implementation because it also updates corresponding ChartAccount !!!
            $invoice->transact();

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
    public function show(Invoice $invoice)
    {
        return view('invoice_show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('invoice_edit', compact('invoice'));
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

            // First Rollback current invoice transactions
            $invoice->rollback();

            // Now update invoice
            $bill=Account::find($request->bill);
            $customer=Subaccount::find($request->Customer);
            $data = [
                'Date' => $request->datevalue,
                'Bill' => $bill->name,
                'Customer'  => $customer->accountname,
                'description'  => $request->description,
            ];
            
            $sum=0;
            for ($i = 1; $i <= 6; $i++) {
                $subaccount_id = $request["subvalue$i"];
                $amount = $request["value$i"];
                $subaccount = Subaccount::find($subaccount_id);
                if ($subaccount) {
                    $data["subaccount$i"] = $subaccount->accountname;
                    $data["subaccountvalue$i"] = $amount;
                    $sum += $amount;
                }
            }
            $data['Total'] = $sum;
            $invoice->update($data);

            // and apply new values
            $invoice->transact();

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
    public function destroy(Invoice $invoice)
    {
        $message = '';

        DB::transaction(function () use ($invoice, &$message) {
            // Reverse amounts
            $invoice->rollback();
            $id=$invoice->id;
            $invoice->delete();
            $message="Invoice with id $id was deleted";
        });
        return redirect()->route('invoices.index')->with(compact('message'));
    }
}
