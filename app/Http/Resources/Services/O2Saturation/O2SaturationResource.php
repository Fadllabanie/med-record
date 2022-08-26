<?php

namespace App\Http\Resources\Services\O2Saturation;

use Illuminate\Http\Resources\Json\JsonResource;

class O2SaturationResource extends JsonResource
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
            'result' => $this->result,
            'pluse' => $this->pluse,
        ];
    }
}
