<?php

namespace App\Http\Resources\Services\Prescription;

use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionResource extends JsonResource
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
            'service' => __('Prescription'),
            'test_type' => $this->test_type,
            'test_result' => $this->test_result,
        ];
    }
}
