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
        $rules = [
            'datevalue' => 'required|date|before_or_equal:' . Carbon::now(),
            'chartvalue' => 'required|exists:chartaccount,id',
            'mainvalue' => 'required|exists:accounts,id',
        ];
        for ($i = 1; $i <= 6; $i++) {
            $fields = '';
            for ($j = 1; $j <= 6; $j++) {
                if ($i != $j) {
                    $fields .=  'subvalue' . $j . ',';
                }
            }
            $fields = rtrim($fields, ',');
            $rules['subvalue' . $i] = 'required_without_all:' . $fields . '|required_with:' . 'value' . $i;
            $rules['value' . $i] = 'required_with:' . 'subvalue' . $i;
        }
        return $rules;
    }


    public function messages()
    {
        $messages = [];
        for ($i = 1; $i <= 6; $i++) {
            $messages['subvalue' . $i . '.required_without_all'] = 'At least one Sub Account must be selected';
            $messages['subvalue' . $i . '.required_with'] = 'The Sub Account field is required when corresponding Amount is defined.';
            $messages['value' . $i . '.required_with'] = 'The Amount field is required when corresponding Sub Account is selected.';
        }
        return $messages;
    }


    public function attributes()
    {
        $attributes = [
            'datevalue' => 'payment Date',
            'chartvalue' => 'Chart of Accounts',
            'mainvalue' => 'Main Account',
        ];
        for ($i = 1; $i <= 6; $i++) {
            $attributes['subvalue' .  $i] = 'Sub Account';
            $attributes['value' .  $i] = 'Amount';
        }
        return $attributes;
    }
}
