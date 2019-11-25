<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subaccount extends Model
{
    protected $primaryKey='subid';

    public function mainaccount()
    {
        return $this->belongsTo(Account::class, 'accountid');
    }

    public function transact($amount)
    {
        if ($this->type == 'D') {
            $this->amount += $amount;
        } elseif ($this->type == 'C') {
            $this->amount -= $amount;
        }
        $this->save();
        $this->mainaccount->transact($amount);
    }

    public function getTypeAttribute()
    {
        if ($this->mainaccount && $this->mainaccount->chart) {
            return $this->mainaccount->chart->type;
        } else {
            return null;
        }
    }
}
