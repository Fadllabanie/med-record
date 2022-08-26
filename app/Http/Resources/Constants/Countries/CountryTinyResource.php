<?php

namespace App\Http\Resources\Constants\Countries;

use App\Models\City;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryTinyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        $cities = City::where('country_id',$this->id)->get();
      
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cities' => CityTinyResource::collection($cities),
        ];
    }
}