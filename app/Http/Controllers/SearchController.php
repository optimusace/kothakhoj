<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
   
    public function searchResults(Request $request){
        $data = $request->validate([
            "title"=>["required","string"],
            "location"=>["required","string"]
        ]);

        $data["title"] = strip_tags($data["title"]);
        $data["location"] = strip_tags($data["location"]);

        $properties = DB::table("properties")
                    ->select("property_basics.*","property_amenities.*","property_localfacilities.*","property_images.*","properties.id")
                    ->join("property_basics","properties.id","=","property_basics.property_id")
                    ->join("property_amenities","properties.id","=","property_amenities.property_id")
                    ->join("property_localfacilities","properties.id","=","property_localfacilities.property_id")
                    ->join("property_images","properties.id","=","property_images.property_id")
                    ->where("property_basics.title",$data["title"])
                    ->where("property_basics.municipality",$data["location"])
                    ->get();

        return view("searchAndFilter",["searchResults"=>$properties]);
    }

    public function filter(Request $request){
      
        $query = DB::table("properties")
                ->select("property_basics.*","property_amenities.*","property_localfacilities.*","property_images.*","properties.id")
                ->join("property_basics","properties.id","=","property_basics.property_id")
                ->join("property_amenities","properties.id","=","property_amenities.property_id")
                ->join("property_localfacilities","properties.id","=","property_localfacilities.property_id")
                ->join("property_images","properties.id","=","property_images.property_id");
                
        if($request->has("ward")){
            $query->where("property_basics.ward","=",$request->input("ward"));
        }

        if($request->has("price")){
            $query->whereBetween("property_basics.price",[0,$request->input("price")]);
        }
        
        if($request->has("floor")){
            $query->where("property_amenities.floor","=",$request->input("floor"));
        }

        if($request->has("roadType")){
            $query->where("property_amenities.roadType","=",$request->input("roadType"));
        }

        if($request->has("category")){
            $query->where("property_basics.category","=",$request->input("category"));
        }

        $results = $query->get();
        return $results;
                
    }
}
