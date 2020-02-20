<?php

namespace App\Http\Requests;

use App\Http\Requests\TransactionRequest;

class InvoiceRequest extends TransactionRequest
{
    public function rules()
    {
        $rules=parent::rules();
        unset($rules['chartvalue']);
        unset($rules['mainvalue']);
        // $rules = array_insert_array($rules, 'subvalue1', ['Customer'=>'required']);
        return $rules;
    }

    public function messages()
    {
        $messages = parent::messages();
        return $messages;
    }

    public function attributes()
    {
        $attributes = parent::attributes();
        $attributes['Customer']='Customer';
        return $attributes;
    }
}
