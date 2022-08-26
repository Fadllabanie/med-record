<?php

namespace App\Http\Resources\Services\Surgery;

use Illuminate\Http\Resources\Json\JsonResource;

class SurgeryResource extends JsonResource
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
            'service' => __('Surgery'),
            'surgery_type' => $this->surgery_type,
        ];
    }
}
