<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
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
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'contact_info' => $this->contact_info,
            'description' => $this->description,
            'name' => $this->name,
            'picture' => $this->picture,
            'price' => $this->price,
            'property_type' => $this->getPropertyTypeInfo()->get()->first(),
            'construction_type' => $this->getConstructionTypeInfo()->get()->first(),
        ];
    }
}
