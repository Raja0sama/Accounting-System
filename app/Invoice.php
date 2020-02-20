<?php

namespace App;

use App\Subaccount;
use App\Sa;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = ['id'];
    protected $dates = [ 'date'];

    public function transact($sign = 1)
    {
        // for ($i = 1; $i <= 6; $i++) {
        //     $subaccount_name = $this["subaccount$i"];
        //     $amount = $this["subaccountvalue$i"];
        //     $subaccount = Subaccount::where('accountname', '=', $subaccount_name)->first();
        //     if ($subaccount) {
        //         $subaccount->transact($sign * $amount);
        //     }
        // }
        foreach(Sa::where([['parentid','=',$this["id"]],['from','=','3']]) as $i => $item){
            $subaccount_name = Subaccount::find($item->nameId)->accountname;
            $amount = $item->amount;
            $subaccount = Subaccount::where('accountname', '=', $subaccount_name)->first();
            if ($subaccount) {
                $subaccount->transact($sign * $amount);
            }
        }

        return $this;
    }

    public function rollback()
    {
        return $this->transact(-1);
    }
}
