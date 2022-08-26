<?php

namespace App\Http\Resources\Services\Family;

use Illuminate\Http\Resources\Json\JsonResource;

class FamilyResource extends JsonResource
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
            'service' => __('Family'),
            'relationship' => $this->relationship,
            'medical_condition' => $this->medical_condition,
        
        ];
    }
}
