<?php

namespace App\Http\Resources\Services\Family;

use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FamilyLargeResource extends JsonResource
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
            'service' =>  __('Family'),
            'pickup_date' =>  $this->pickup_date,
            'pickup_time' =>  $this->pickup_time,
            'relationship' => $this->relationship,
            'medical_condition' => $this->medical_condition,
            'comment' => $this->comment,
            'attachments' => MediaResource::collection($this->media)
        ];
    }
}
