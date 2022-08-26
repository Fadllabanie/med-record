<?php

namespace App\Http\Requests\Api\Services\Weight;

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
            'weight'=> 'required',
            'perfect_weight'=> 'required',
            'perfect_weight_unit'=> 'required',
            'height'=> 'required',
            'height_unit'=> 'required',
            'comment' => 'required|min:2|max:100',
        ];
    }
}
