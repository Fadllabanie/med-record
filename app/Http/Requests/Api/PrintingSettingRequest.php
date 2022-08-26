<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\API\APIRequest;
use App\Models\Patient;

class PrintingSettingRequest extends APIRequest
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
            'left' => 'required',
            'right' => 'required',
            'top' =>  'required',
            'bottom' =>  'required',
            'add_signature' =>  'required',
            'add_diagnosis' =>  'required',
            'settings' => 'required',
        ];
    }
}
