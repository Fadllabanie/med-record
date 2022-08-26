<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\API\APIRequest;

class RegisterRequest extends APIRequest
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
            'specialization_id' => 'required|exists:specializations,id',
            'country_id' =>'required|numeric|exists:countries,id',
            'city_id' => 'required|numeric|exists:cities,id',
            'full_name' => 'required|min:5|max:75',
            'email' => 'required|email|unique:users,email',
            'mobile' =>  'required|numeric|unique:users,mobile',
            'birthday' =>  'required|date|date_format:Y-m-d',
            'gender' =>  'required|in:male,female',
            'lat' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lng' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'describe_specialize' =>  'required|min:5',
            'clinic_name' => 'required|min:5|max:75',
            'clinic_email' => 'required|email|unique:clinics,email',
            'clinic_mobile' =>  'required|numeric|unique:clinics,mobile',
            'another_mobile' =>  'required|numeric|unique:clinics,another_mobile',
            'whatsapp_number' =>  'required|numeric',
            'signature_text' => 'nullable',
            'signature_image' => 'nullable',
            'is_display' => 'required|boolean',
            'attachment' =>  'required',
            'logo' =>  'required',
        ];
    }
}
