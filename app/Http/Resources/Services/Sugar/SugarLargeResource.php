<?php

namespace App\Http\Resources\Services\Sugar;

use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SugarLargeResource extends JsonResource
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
            'service' => __('Sugar'),
            'test_type' => $this->test_type,
            'sugar_level' => $this->sugar_level,
            'patient_id' =>  $this->patient_id,
            'pickup_date' =>  $this->pickup_date,
            'pickup_time' =>  $this->pickup_time,
            'comment' => $this->comment,
            'attachments' => MediaResource::collection($this->media)
        ];
    }
}
