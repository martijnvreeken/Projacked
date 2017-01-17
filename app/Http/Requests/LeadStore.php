<?php

namespace Projacked\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadStore extends FormRequest
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
            'client_name' => 'required',
            'client_email' => 'required|email',
            'client_phone' => '',
            'description' => 'required',
            'proposal' => '',
            'fixed_price' => '',
            'hour_rate' => '',
            'hour_estimate' => ''
        ];
    }
}
