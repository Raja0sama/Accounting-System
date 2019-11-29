<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
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
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        try {
            $account=Account::create($request->input());
            if ($account) {
                $message='Account with id ' . $account->id . ' was created';
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
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        try {
            if ($account->subaccounts && $account->subaccounts->count()) {
                return error("Can't update Main Account  '" . $account->name .
                             "' because it has Sub Account(s) : " . $account->subaccounts->pluck('accountname')->implode(', '));
            }
            $account->update($request->input());
            $message='Main Account with id ' . $account->id . ' was updated';
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
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        if ($account->subaccounts && $account->subaccounts->count()) {
            $errors['delete']=["Can't delete Main Account  '" . $account->name .
                               "' because it has Sub Account(s) : " . $account->subaccounts->pluck('accountname')->implode(', ') ];
            return response(['errors'=>$errors], 422);
        }
        $name=$account->name;
        $account->delete();
        $message='Main Account ' . $name . ' was deleted';
        return compact('message');
    }
}
