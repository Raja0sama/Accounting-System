<?php

namespace App\Http\Requests;

use Illuminate\Support\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AdjustmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'datevalue' => 'required|date|before_or_equal:' . Carbon::now(),
            'chartvalue' => 'required|exists:chartaccounts,id',
            'mainvalue' => 'required|exists:accounts,id',
            'subvalue'  => 'required|exists:subaccounts,subid',
            'value'  => 'required',
            'chartvalue1' => 'required|exists:chartaccounts,id',
            'mainvalue1' => 'required|exists:accounts,id',
            'subvalue1'  => 'required|exists:subaccounts,subid',
            'value1'  => 'required|same:value',
            'description'=>'required|max:255'
        ];
        return $rules;
    }

    public function attributes()
    {
        $attributes = [
        'datevalue' => 'Date',
        'chartvalue' => 'Debit Chart of Accounts',
        'chartvalue1' => 'Credit Chart of Accounts',
        'mainvalue' => 'Debit Main Account',
        'mainvalue1' => 'Credit Main Account',
        'subvalue' => 'Debit Sub Account',
        'subvalue1' => 'Credit Sub Account',
        'value' => 'Debit Amount',
        'value1' => 'Credit Amount',
        'description' => 'Description',
        ];
        return $attributes;
    }
}
