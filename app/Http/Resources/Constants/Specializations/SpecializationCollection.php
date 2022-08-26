<?php

namespace App\Http\Resources\Constants\Specializations;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SpecializationCollection extends ResourceCollection
{

    public $collects = SpecializationTinyResource::class;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'status' => 1,
            'message' => __('Success Request'),
            'data' => parent::toArray($request),
        ];

    }
}
