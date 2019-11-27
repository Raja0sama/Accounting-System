<?php

namespace App\Http\Controllers;

use App\Account;
use App\Adjustment;
use App\Subaccount;
use App\Chartaccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdjustmentRequest;

class AdjustmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adjustments=Adjustment::all();
        return view('adjustment_index', compact('adjustments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adjustment_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdjustmentRequest $request)
    {
        $message='';
        DB::transaction(function () use ($request, &$message) {
            $date=$request->datevalue;
            $chart_id=$request->chartvalue;
            $account_id=$request->mainvalue;
            $subaccount_id=$request->subvalue;
            $amount=$request->value;
            $chart1_id=$request->chartvalue1;
            $account1_id=$request->mainvalue1;
            $subaccount1_id=$request->subvalue1;
            $amount1=$request->value1;
            $description=$request->description;
            $chartaccount=Chartaccount::find($chart_id)->accountname;
            $mainaccount=Account::find($account_id)->name;
            $subaccount=Subaccount::find($subaccount_id)->accountname;
            $chartaccount1=Chartaccount::find($chart1_id)->accountname;
            $mainaccount1=Account::find($account1_id)->name;
            $subaccount1=Subaccount::find($subaccount1_id)->accountname;
            $data=compact(
                'date',
                'chartaccount',
                'mainaccount',
                'subaccount',
                'amount',
                'chartaccount1',
                'mainaccount1',
                'subaccount1',
                'amount1',
                'description',
            );
            $adjustment=Adjustment::create($data);
            $adjustment->transact();
            $message='Adjustment with id '. $adjustment->id . ' was created';
        });
        return redirect()->route('adjustments.create')->with(compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Adjustment  $adjustment
     * @return \Illuminate\Http\Response
     */
    public function show(Adjustment $adjustment)
    {
        return view('adjustment_show')->with(compact('adjustment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adjustment  $adjustment
     * @return \Illuminate\Http\Response
     */
    public function edit(Adjustment $adjustment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adjustment  $adjustment
     * @return \Illuminate\Http\Response
     */
    public function update(AdjustmentRequest $request, Adjustment $adjustment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adjustment  $adjustment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adjustment $adjustment)
    {
        //
    }
}
