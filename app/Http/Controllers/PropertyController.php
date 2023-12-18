<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyBasic;
use App\Models\PropertyImage;
use App\Models\PropertyAmenity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\PropertyLocalfacility;

class PropertyController extends Controller
{
    
    

    public function check(Request $request){
     /*    $allData = Property::with("property_basic","property_amenity","property_local_facility","property_image")->get();
        return view("check",["properties"=>$allData]); */

       /*  $propertyDetails = Property::where("id",22)
        ->with("property_basic","property_amenity","property_local_facility","property_image")
        ->get()->first();

        $data = Property::with("property_basic","property_amenity","property_local_facility","property_image")
        ->orderBy("created_at","desc")
        ->get(); */
        

        /* $similarProperties = DB::table("properties")
                           ->join("property_basics","properties.id","=","property_basics.property_id")
                            ->get(); */

       /*  $similarProperties = DB::table("properties")
        ->select("property_basics.*","property_amenities.*","property_localfacilities.*","property_images.*","properties.id")
        ->join("property_basics","properties.id","=","property_basics.property_id")
        ->join("property_amenities","properties.id","=","property_amenities.property_id")
        ->join("property_localfacilities","properties.id","=","property_localfacilities.property_id")
        ->join("property_images","properties.id","=","property_images.property_id")
        ->whereBetween("property_basics.price",[$propertyDetails->property_basic->price - 4000,$propertyDetails->property_basic->price + 4000])
        ->where("properties.id","!=",$propertyDetails->id)   
        ->take(4)
        ->get(); */
       

        /* $data = Property::with("property_basic","property_amenity","property_local_facility","property_image")
        ->orderBy("property_basics.price","desc")
        ->limit(8)
        ->get();
         */
        
        /*  $data = DB::table("properties")
         ->select("property_basics.*","property_amenities.*","property_localfacilities.*","property_images.*","properties.id")
         ->join("property_basics","properties.id","=","property_basics.property_id")
         ->join("property_amenities","properties.id","=","property_amenities.property_id")
         ->join("property_localfacilities","properties.id","=","property_localfacilities.property_id")
         ->join("property_images","properties.id","=","property_images.property_id")
         ->orderBy("property_basics.price","asc")
         ->get();
 */
        /* $userId = auth()->user()->id;
        $myPropertyList = DB::table("properties")
        ->select("property_basics.*","property_amenities.*","property_localfacilities.*","property_images.*","properties.id")
        ->join("property_basics","properties.id","=","property_basics.property_id")
        ->join("property_amenities","properties.id","=","property_amenities.property_id")
        ->join("property_localfacilities","properties.id","=","property_localfacilities.property_id")
        ->join("property_images","properties.id","=","property_images.property_id")
        ->where("user_id",$userId)
        ->get();

        return view("check",["results"=>$myPropertyList]); */

        
       
    }


    public function details(string $id){
        $propertyDetails = Property::where("id",$id)
                            ->with("property_basic","property_amenity","property_local_facility","property_image")
                            ->get()
                            ->first();

        $similarProperties = DB::table("properties")
                            ->select("property_basics.*","property_amenities.*","property_localfacilities.*","property_images.*","properties.id")
                            ->join("property_basics","properties.id","=","property_basics.property_id")
                            ->join("property_amenities","properties.id","=","property_amenities.property_id")
                            ->join("property_localfacilities","properties.id","=","property_localfacilities.property_id")
                            ->join("property_images","properties.id","=","property_images.property_id")
                            ->whereBetween("property_basics.price",[$propertyDetails->property_basic->price - 4000,$propertyDetails->property_basic->price + 4000])
                            ->where("properties.id","!=",$propertyDetails->id)   
                            ->take(4)
                            ->get();

        return view("propertyDetails",["details"=>$propertyDetails,"similar"=>$similarProperties]);
    }

   
}
