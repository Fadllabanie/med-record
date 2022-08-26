<?php

namespace App\Http\Requests\Api\Patients;

use App\Http\Requests\API\APIRequest;

class StoreRequest extends APIRequest
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
            'full_name' => 'required|min:5|max:75',
            'email' => 'required|email',
            'mobile' =>  'required|numeric',
            'insurance_number' =>  'required|numeric',
            'birthday' =>  'required|date|date_format:Y-m-d',
            'gender' =>  'required|in:male,female',
            'country_id' => 'required|numeric|exists:countries,id',
            'city_id' => 'required|numeric|exists:cities,id',
            'lat' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lng' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'allergy' =>  'required',
            'blood_type' =>  'required',
            'immunity' =>  'required',
            'chronic_diseases' =>  'required',
            'surgery' =>  'required',
            'note' =>  'required',
        ];
    }
}
