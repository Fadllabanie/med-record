<?php

namespace App\Http\Resources\Services\Sugar;

use Illuminate\Http\Resources\Json\JsonResource;

class SugarResource extends JsonResource
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
        ];
    }
}
