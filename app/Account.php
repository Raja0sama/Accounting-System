<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function chart()
    {
        return $this->belongsTo(Chartaccount::class,'chartid','chartid');
    }

    public function transact($amount, $propagate = true)
    {
        if ($this->type == 'D') {
            $this->amount += $amount;
        } elseif ($this->type == 'C'){
            $this->amount -= $amount;
        }
        $this->save();
        if($propagate) {
            $this->chart->transact($amount);
        }
    }

    public function getTypeAttribute()
    {
        if ( $this->chart) {
            return $this->chart->type;
        } else {
            return null;
        }
    }
}
