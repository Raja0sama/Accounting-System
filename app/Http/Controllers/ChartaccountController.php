<?php

namespace App\Http\Controllers;

use Exception;
use App\Chartaccount;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Requests\ChartaccountRequest;
use Illuminate\Database\QueryException;

class ChartaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chartaccount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChartaccountRequest $request)
    {
        try {
            $chartaccount=Chartaccount::create($request->input());
            if ($chartaccount) {
                $message='Chart Account with id ' . $chartaccount->id . ' was created';
                return compact('message');
            } else {
                $errors=[];
                $errors['create']=['Error while creating new record'];
                return compact('errors');
            }
        } catch (QueryException $exception) {
            $errors['create']=[$exception->errorInfo  ?? ($exception->getmessage() ?? 'Error creating Chart Account')];
            return response(['errors'=>$errors], 500);
        } catch (Exception $exception) {
            $errors['create']=[$exception->errorInfo  ?? ($exception->getmessage() ?? 'Error creating Chart Account')];
            return response(['errors'=>$errors], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chartaccount  $chartaccount
     * @return \Illuminate\Http\Response
     */
    public function show(Chartaccount $chartaccount)
    {
        // n/a
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chartaccount  $chartaccount
     * @return \Illuminate\Http\Response
     */
    public function edit(Chartaccount $chartaccount)
    {
        // we will see
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chartaccount  $chartaccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chartaccount $chartaccount)
    {
        try {
            if ($request->chartid != $chartaccount->chartid) {
                $exists=Chartaccount::where('chartid', $request->chartid)->count();
                if ($exists) {
                    return error('Chartid ' . $request->chartid . ' is taken');
                }
            }
            if ($chartaccount->accounts && $chartaccount->accounts->count()) {
                return error("Can't update Chart Account '" . $chartaccount->accountname .
                             "' because it has Main Account(s) : " . $chartaccount->accounts->pluck('name')->implode(', '));
            }
            $chartaccount->update($request->input());
            $message='Chart Account with id ' . $chartaccount->id . ' was updated';
            return compact('message');
        } catch (QueryException $exception) {
            $errors['create']=[$exception->errorInfo  ?? ($exception->getmessage() ?? 'Error updating Chart Account')];
            return response(['errors'=>$errors], 500);
        } catch (Exception $exception) {
            $errors['create']=[$exception->errorInfo  ?? ($exception->getmessage() ?? 'Error updating Chart Account')];
            return response(['errors'=>$errors], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chartaccount  $chartaccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chartaccount $chartaccount)
    {
        if ($chartaccount->accounts && $chartaccount->accounts->count()) {
            $errors['delete']=["Can't delete Chart Account '" . $chartaccount->accountname .
                               "' because it has Main Account(s) : " . $chartaccount->accounts->pluck('name')->implode(', ') ];
            return response(['errors'=>$errors], 422);
        }
        $name=$chartaccount->accountname;
        $chartaccount->delete();
        $message='Chart Account ' . $name . ' was deleted';
        return compact('message');
    }
}
