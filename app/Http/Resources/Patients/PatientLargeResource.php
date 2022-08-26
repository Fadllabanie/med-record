<?php

namespace App\Http\Resources\Patients;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientLargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'mobile' => $this->mobile,
            'insurance_number' => $this->insurance_number,
            'gender' => $this->gender,
            'age' => age($this->birthday),
            'address' => $this->address,
            'last_visit' => now()->format('d M Y'),
            'avatar' => asset('storage/' . $this->avatar),
            'blood_type' => $this->blood_type,
            'allergy' => $this->allergy,
            'immunity' => $this->immunity,
            'chronic_diseases' => $this->chronic_diseases,
            'surgery' => $this->surgery,
        ];
    }
}