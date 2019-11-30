<?php

namespace App\Http\Controllers;

use App\Subaccount;
use Illuminate\Http\Request;
use App\Http\Requests\SubaccountRequest;

class SubaccountController extends Controller
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
        return view('subaccount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubaccountRequest $request)
    {
        try {
            $subaccount=Subaccount::create($request->input());
            if ($subaccount) {
                $message='Sub Account with id ' . $subaccount->subid . ' was created';
                return compact('message');
            } else {
                $errors=[];
                $errors['create']=['Error while creating new record'];
                return compact('errors');
            }
        } catch (QueryException $exception) {
            $errors['create']=[$exception->errorInfo  ?? ($exception->getmessage() ?? 'Error creating Account')];
            return response(['errors'=>$errors], 500);
        } catch (Exception $exception) {
            $errors['create']=[$exception->errorInfo  ?? ($exception->getmessage() ?? 'Error creating Account')];
            return response(['errors'=>$errors], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subaccount  $subaccount
     * @return \Illuminate\Http\Response
     */
    public function show(Subaccount $subaccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subaccount  $subaccount
     * @return \Illuminate\Http\Response
     */
    public function edit(Subaccount $subaccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subaccount  $subaccount
     * @return \Illuminate\Http\Response
     */
    public function update(SubaccountRequest $request, Subaccount $subaccount)
    {
        try {
            $subaccount->update($request->input());
            $message='Sub Account with id ' . $subaccount->subid . ' was updated';
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
     * @param  \App\Subaccount  $subaccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subaccount $subaccount)
    {
        $name=$subaccount->accountname;
        $subaccount->delete();
        $message='Sub Account ' . $name . ' was deleted';
        return compact('message');
    }
}
