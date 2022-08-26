<?php

namespace App\Http\Resources\Services\MedicalTest;

use Illuminate\Http\Resources\Json\JsonResource;

class MedicalTestResource extends JsonResource
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
            'service' => __('Medical Test'),
            'test_type' => $this->test_type,
            'test_result' => $this->test_result,
        ];
    }
}
