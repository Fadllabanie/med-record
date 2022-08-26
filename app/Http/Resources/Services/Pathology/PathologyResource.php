<?php

namespace App\Http\Resources\Services\Pathology;

use Illuminate\Http\Resources\Json\JsonResource;

class PathologyResource extends JsonResource
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
            'service' => __('Pathology'),
            'test_type' => $this->test_type,
            'test_result' => $this->test_result,
        ];
    }
}
