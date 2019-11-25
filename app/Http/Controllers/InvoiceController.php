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
            $sum = 0 + $request->value1;
            $sum += $request->value2;
            $sum += $request->value3;
            $sum += $request->value4;
            $sum += $request->value5;
            $sum += $request->value6;
            $bill=Account::find($request->bill);
            $customer=Subaccount::find($request->Customer);
            $data = [
                'Date' => $request->datevalue,
                'Bill' => $bill->name,
                'Customer'  => $customer->accountname,
                'description'  => $request->description,
                'Total' => $sum,
            ];
            // This differs from CORE PHP implementation because it also updates corresponding ChartAccount !!!
            for ($i = 1; $i <= 6; $i++) {
                $subaccount_id = $request["subvalue$i"];
                $amount = $request["value$i"];
                $subaccount = Subaccount::find($subaccount_id);
                if ($subaccount) {
                    $subaccount->transact($amount);
                    $data["subaccount$i"] = $subaccount->accountname;
                    $data["subaccountvalue$i"] = $amount;
                }
            }
            $invoice = Invoice::create($data);
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

        $s='<div><h1> I am not sure what I should do here.<br>';
        $s.='If an amount changed, should I debit the balance of subaccount with the delta ? <br>';
        $s.='If a subaccount changed then what ? If nothing changed should I debit again ??<br> </h1>';
        $s.='<script> setTimeout( function(){ location="' . route('invoices.index') . '" } , 15000 ) </script>';
        $s.='<span> This page will automatically redirect to <a href="' . route('invoices.index') . '"> ' . route('invoices.index')  . ' </a></span>';
        return $s;
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
            for ($i = 1; $i <= 6; $i++) {
                $subaccount_name = $invoice["subaccount$i"];
                $amount = $invoice["subaccountvalue$i"];
                $subaccount = Subaccount::where('accountname', '=', $subaccount_name)->first();
                if ($subaccount) {
                    $subaccount->transact(-$amount);
                }
            }
            $id=$invoice->id;
            $invoice->delete();
            $message="Invoice with id $id was deleted";
        });
        return redirect()->route('invoices.index')->with(compact('message'));
    }
}
