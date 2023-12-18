<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function showRecentAndRecommended(){
        $recent = Property::with("property_basic","property_amenity","property_local_facility","property_image")
                ->orderBy("created_at","desc")
                ->limit(8)
                ->get();

        $recommended = DB::table("properties")
                ->select("property_basics.*","property_amenities.*","property_localfacilities.*","property_images.*","properties.id")
                ->join("property_basics","properties.id","=","property_basics.property_id")
                ->join("property_amenities","properties.id","=","property_amenities.property_id")
                ->join("property_localfacilities","properties.id","=","property_localfacilities.property_id")
                ->join("property_images","properties.id","=","property_images.property_id")
                ->orderBy("property_basics.price","asc")
                ->limit(8)
                ->get();
        
        return view("homePage",["recommendedProperty"=>$recommended,"recentProperty"=>$recent]);
    }

    public function viewAllRecent(){
        $allRecent = DB::table("properties")
                ->select("property_basics.*","property_amenities.*","property_localfacilities.*","property_images.*","properties.id")
                ->join("property_basics","properties.id","=","property_basics.property_id")
                ->join("property_amenities","properties.id","=","property_amenities.property_id")
                ->join("property_localfacilities","properties.id","=","property_localfacilities.property_id")
                ->join("property_images","properties.id","=","property_images.property_id")
                ->orderBy("properties.created_at","desc")
                ->get();

        return view("viewAllPage",["allProperties"=>$allRecent]);
    }

    public function viewAllRecommended(){
        $allRecommended = DB::table("properties")
                ->select("property_basics.*","property_amenities.*","property_localfacilities.*","property_images.*","properties.id")
                ->join("property_basics","properties.id","=","property_basics.property_id")
                ->join("property_amenities","properties.id","=","property_amenities.property_id")
                ->join("property_localfacilities","properties.id","=","property_localfacilities.property_id")
                ->join("property_images","properties.id","=","property_images.property_id")
                ->orderBy("property_basics.price","asc")
                ->get();
        
        return view("viewAllPage",["allProperties"=>$allRecommended]);
    }
}
