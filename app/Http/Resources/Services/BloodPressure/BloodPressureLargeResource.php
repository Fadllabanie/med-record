<?php

namespace App\Http\Resources\Services\BloodPressure;

use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BloodPressureLargeResource extends JsonResource
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
            'lower_bound_beats' => $this->lower_bound_beats,
            'comment' => $this->comment,
            'attachments' => MediaResource::collection($this->media)
        ];
    }
}
