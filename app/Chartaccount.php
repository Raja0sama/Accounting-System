<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chartaccount extends Model
{
    protected $appends = ['typeName'];
    protected $guarded = ['id'];

    public function accounts()
    {
        return $this->hasMany(Account::class, 'chartid');
    }

    public function transact($amount)
    {
        if ($this->type == 'D') {
            $this->amount += $amount;
        } elseif ($this->type == 'C') {
            $this->amount -= $amount;
        }
        $this->save();
    }

    public function getTypeNameAttribute()
    {
        if ($this->type=='D') {
            return  'Debit';
        } elseif ($this->type=='C') {
            return  'Credit';
        }
        return '';
    }
}
