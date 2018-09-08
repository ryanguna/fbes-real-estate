<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function getPropertyTypeInfo(){
        return $this->belongsTo('App\PropertyType', 'property_type_id', 'id');
    }
    public function getConstructionTypeInfo(){
        return $this->belongsTo('App\ConstructionType', 'construction_type_id', 'id');
    }
}
