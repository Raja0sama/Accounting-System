<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChartaccountRequest extends FormRequest
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
            'accountname' => 'required|unique:chartaccounts',
            'chartid' => 'required|unique:chartaccounts',
            'type' => 'required|in:D,C',
            //
        ];
    }
}
