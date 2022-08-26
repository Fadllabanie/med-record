<?php

namespace App\Http\Resources\Services\BloodPressure;

use Illuminate\Http\Resources\Json\JsonResource;

class BloodPressureResource extends JsonResource
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
            'service' => __('Blood Pressure'),
            'upper_bound' => $this->upper_bound,
            'lower_bound' => $this->lower_bound,
        ];
    }
}
