<?php

namespace App\Http\Resources\Services\Prescription;

use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PrescriptionLargeResource extends JsonResource
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
            'patient_id' =>  $this->patient_id,
            'pickup_date' =>  $this->pickup_date,
            'pickup_time' =>  $this->pickup_time,
            'test_type' =>  $this->test_type,
            'test_result' =>  $this->test_result,
            'normal_test_percentage' =>   $this->normal_test_percentage,
            'doctor_name' =>   $this->doctor_name,
            'lab_name' =>  $this->lab_name,
            'comment' => $this->comment,
            'attachments' => MediaResource::collection($this->media)
        ];
    }
}
