<?php

namespace App\Http\Resources\Services\Vaccine;

use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VaccineLargeResource extends JsonResource
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
            'service' => __('Vaccine'),
            'name' => $this->name,
            'pickup_date' =>  $this->pickup_date,
            'pickup_time' =>  $this->pickup_time,
            'comment' => $this->comment,
            'attachments' => MediaResource::collection($this->media)
        ];
    }
}
