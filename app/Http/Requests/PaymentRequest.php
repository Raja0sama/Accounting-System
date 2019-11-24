<?php

namespace App\Http\Requests;

use Illuminate\Support\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'datevalue' => 'required|date|before_or_equal:' . Carbon::now(),
            'chartvalue' => 'required|exists:chartaccount,id',
            'mainvalue' => 'required|exists:accounts,id',
        ];
    }

    public function attributes()
    {
        return [
        'datevalue' => 'payment Date',
        'chartvalue' => 'Chart of Accounts',
        'mainvalue' => 'Main Account'
        ];
}
}
