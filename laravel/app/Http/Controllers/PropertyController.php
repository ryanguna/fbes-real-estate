<?php

namespace App\Http\Controllers;

use App\Http\Resources\PropertyResource;
use App\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Query properties
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function queryProperty(Request $request)
    {

        $selectedBedroom =  $request->input('selectedBedroom');
        $bedroomOperator = '';

        if($selectedBedroom == 0 || $selectedBedroom == 4){
            $bedroomOperator = '>=';
        }else{
            $bedroomOperator = '=';
        }

        $selectedBathroom =  $request->input('selectedBathroom');
        $bathroomOperator = '';

        if($selectedBathroom == 0 || $selectedBathroom == 3){
            $bathroomOperator = '>=';
        }else{
            $bathroomOperator = '=';
        }

        $selectedPropertyType =  $request->input('selectedPropertyType');
        $propertyTypeOperator = '';

        if($selectedPropertyType == 0){
            $propertyTypeOperator = '>=';
        }else{
            $propertyTypeOperator = '=';
        }

        $selectedPrice =  $request->input('selectedPrice');
        $priceOperator = '';

        if($selectedPrice == 0){
            $priceOperator = '>=';
        }else{
            $priceOperator = '<=';
        }


        return PropertyResource::collection(Property::where('bedrooms', "$bedroomOperator" , $selectedBedroom)
                ->where('bathrooms', "$bathroomOperator" , $selectedBathroom)
                ->where('property_type_id', "$propertyTypeOperator" , $selectedPropertyType)
                ->where('price', "$priceOperator" , $selectedPrice)
                ->get());









    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
