<?php

namespace App\Http\Resources\Services\Surgery;

use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SurgeryLargeResource extends JsonResource
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
            'service' => __('surgery'),
            'surgery_type' => $this->surgery_type,
            'surgery_result' => $this->surgery_result,
            'doctor_name' => $this->doctor_name,
            'hospital_name' => $this->hospital_name,
            'pickup_date' =>  $this->pickup_date,
            'pickup_time' =>  $this->pickup_time,
            'comment' => $this->comment,
            'attachments' => MediaResource::collection($this->media)
        ];
    }
}
