<?php

namespace App\Http\Resources\Services\CholesterolTriglyceride;

use App\Http\Resources\MediaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CholesterolTriglycerideLargeResource extends JsonResource
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
            'service' => __('Cholesterol Triglyceride'),
            'test_type' => $this->test_type,
            'cholesterol' => $this->cholesterol,
            'triglycerides' => $this->triglycerides,
            'measuring_unit' => $this->measuring_unit,
            'comment' => $this->comment,
            'attachments' => MediaResource::collection($this->media)
        ];
    }
}
