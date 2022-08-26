<?php

namespace App\Http\Requests\Api\Services\BloodPressure;

use App\Models\Patient;
use App\Http\Requests\API\APIRequest;

class UpdateRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $patient = Patient::where([
            ['id', '=', $this->patient_id],
            ['doctor_id', '=', auth()->id()]
        ])->first();

        if (is_null($patient)) {
            return false;
        }

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
            'pickup_date' => 'required|date|date_format:Y-m-d',
            'pickup_time' =>  'required|date_format:H:i',
            'upper_bound' =>  'required',
            'lower_bound' =>  'required',
            'lower_bound_beats' =>  'required',
            'comment' => 'required|min:2|max:100',
        ];
    }
}
