<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    protected $guarded = [ 'id'];
    protected $dates = [ 'date'];

    public function transact()
    {
        $subaccount=Subaccount::where('accountname', $this->subaccount)->first();
        $subaccount1=Subaccount::where('accountname', $this->subaccount1)->first();
        $subaccount->transact($this->amount);
        $subaccount1->transact(- $this->amount1);
        return $this;
    }
}
