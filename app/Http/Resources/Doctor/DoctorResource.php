<?php

namespace App\Http\Resources\Doctor;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
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
            'code' => $this->code,
            'full_name' => $this->full_name,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'avatar' => asset($this->avatar),
            'verified' => date("Y-m-d", strtotime($this->verified_at)),
            'token_type' => 'Bearer',
            'access_token' => $this->remember_token,
        ];
    }
}
