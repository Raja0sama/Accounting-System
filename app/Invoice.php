<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = ['id'];
    protected $dates = [ 'date'];
}
