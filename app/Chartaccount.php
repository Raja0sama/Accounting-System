<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chartaccount extends Model
{
    protected $table='chartaccount';

    public function transact($amount)
    {
        if ($this->type == 'D') {
            $this->amount += $amount;
        } elseif ($this->type == 'C'){
            $this->amount -= $amount;
        }
        $this->save();
    }

}
