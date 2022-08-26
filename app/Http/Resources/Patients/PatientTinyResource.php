<?php

namespace App\Http\Resources\Patients;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientTinyResource extends JsonResource
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
            'code' => $this->code,
            'full_name' => $this->full_name,
            'mobile' => $this->mobile,
            'insurance_number' => $this->insurance_number,
            'gender' => $this->gender,
            'age' => age($this->birthday),
            'last_visit' => now()->format('d M Y'),
            'avatar' => asset('storage/' . $this->avatar)
        ];
    }
}
