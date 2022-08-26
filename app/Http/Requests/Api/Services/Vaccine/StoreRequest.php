<?php

namespace App\Http\Requests\Api\Services\Vaccine;

use App\Models\Patient;
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
            'patient_id' => 'required|exists:patients,id',
            'pickup_date' => 'required|date|date_format:Y-m-d',
            'pickup_time' =>  'required|date_format:H:i',
            'name' =>  'required',
            'comment' => 'required|min:2|max:100',
        ];
    }
}
