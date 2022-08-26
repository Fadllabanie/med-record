<?php

namespace App\Http\Resources\Constants\Countries;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CountryCollection extends ResourceCollection
{

    public $collects = CountryTinyResource::class;

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
