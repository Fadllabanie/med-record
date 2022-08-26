<?php

namespace App\Http\Resources\Services\CholesterolTriglyceride;

use Illuminate\Http\Resources\Json\JsonResource;

class CholesterolTriglycerideResource extends JsonResource
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
            'cholesterol' => $this->cholesterol,
            'triglycerides' => $this->triglycerides,
        ];
    } 
}
