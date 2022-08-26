<?php

namespace App\Http\Resources\Services\O2Saturation;

use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class O2SaturationLargeResource extends JsonResource
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
            'service' => __('O2 Saturation'),
            'pickup_date' =>  $this->pickup_date,
            'pickup_time' =>  $this->pickup_time,
            'result' => $this->result,
            'pluse' => $this->pluse,
            'comment' => $this->comment,
            'attachments' => MediaResource::collection($this->media)
        ];
    }
}
