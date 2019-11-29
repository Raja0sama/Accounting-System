<?php

namespace App;

use App\Subaccount;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded=['id'];

    public function chart()
    {
        return $this->belongsTo(Chartaccount::class, 'chartid', 'chartid');
    }

    public function subaccounts()
    {
        return $this->hasMany(Subaccount::class, 'accountid');
    }

    public function transact($amount, $propagate = true)
    {
        if ($this->type == 'D') {
            $this->amount += $amount;
        } elseif ($this->type == 'C') {
            $this->amount -= $amount;
        }
        $this->save();
        if ($propagate) {
            $this->chart->transact($amount);
        }
    }

    public function getTypeAttribute()
    {
        if ($this->chart) {
            return $this->chart->type;
        } else {
            return null;
        }
    }
}
