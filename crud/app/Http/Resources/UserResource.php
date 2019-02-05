<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'street' => $this->street,
            'suite' => $this->suite,
            'city' =>$this->city,
            'zipcode' => $this->zipcode,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'phone' => $this->phone,
            'website' => $this->website,
            'cName' => $this->cName,
            'catchPhrase' => $this->catchPhrase,
            'bs' => $this->bs,
        ];
    }
}
