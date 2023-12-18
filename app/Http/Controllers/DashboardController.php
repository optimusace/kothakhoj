<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyBasic;
use App\Models\PropertyImage;
use App\Models\PropertyAmenity;
use Illuminate\Support\Facades\DB;
use App\Models\PropertyLocalfacility;

class DashboardController extends Controller
{   

    /* ADD PROPERTY */
    public function store(Request $request){

        /* VALIDATE NECESSARY INPUT FIELDS */
        $inputData = $request->validate([
            "title"=>"required",
            "category"=>"required",
            "price"=>"required",
            "negotiation"=>"required",
            "contact"=>"required",
            "ward"=>"required",
            "municipality"=>"required",
            "district"=>"required",
            "numberOfRoom"=>"required",
            "floor"=>"required",
            "roadType"=>"required",

            "image1"=>["required","image","mimes:jpg,jpeg,png","max:6144"],
            "image2"=>["required","image","mimes:jpg,jpeg,png","max:6144"],
            "image3"=>["required","image","mimes:jpg,jpeg,png","max:6144"],
            "image4"=>["required","image","mimes:jpg,jpeg,png","max:6144"],
            "image5"=>["required","image","mimes:jpg,jpeg,png","max:6144"]
        ]);

        /* STRIP INPUT FOR HTML AND PHP TAGS AND SCRIPTS */
        $inputData["title"] = strip_tags($inputData["title"]);
        $inputData["price"] = strip_tags($inputData["price"]);
        $inputData["contactt"] = strip_tags($inputData["contact"]);
        $inputData["ward"] = strip_tags($inputData["ward"]);
        $inputData["municipality"] = strip_tags($inputData["municipality"]);
        $inputData["district"] = strip_tags($inputData["district"]);
        $inputData["numberOfRoom"] = strip_tags($inputData["numberOfRoom"]);
        $inputData["floor"] = strip_tags($inputData["floor"]);
        $inputData["roadType"] = strip_tags($inputData["roadType"]);

        /* SET VALUE IF CHECKBOX IS MARKED OR NOT, IF MARKETD VALUE IS SET TO 1 ELSE SET TO 0 */
        $gym = $request["gym"] ? 1:0;
        $swimming = $request["swimming"] ? 1:0;
        $hospital = $request["hospital"] ? 1:0;
        $montessori = $request["montessori"] ? 1:0;
        $gas = $request["gas"] ? 1:0;
        $temple = $request["temple"] ? 1:0;
        $resturants = $request["resturants"] ? 1:0;
        $bank = $request["bank"] ? 1:0;
        $bus = $request["bus"] ? 1:0;
        $school = $request["school"] ? 1:0;
        $park = $request["park"] ? 1:0;
        $college = $request["college"] ? 1:0;
        $market = $request["market"] ? 1:0;
        $banquet = $request["banquet"] ? 1:0;

        /* GET PATH FOR IMAGE */
        $image1Path = $request->file("image1")->store("uploads","public");
        $image2Path = $request->file("image2")->store("uploads","public");
        $image3Path = $request->file("image3")->store("uploads","public");
        $image4Path = $request->file("image4")->store("uploads","public");
        $image5Path = $request->file("image5")->store("uploads","public");
 
        $property = new Property([
            "user_id"=>auth()->user()->id
        ]);
        $property->save();

        $basic = new PropertyBasic([
            "title"=>$inputData["title"],
            "category"=>$inputData["category"],
            "price"=>$inputData["price"],
            "negotiation"=>$inputData["negotiation"],
            "contact"=>$inputData["contact"],
            "ward"=>$inputData["ward"],
            "municipality"=>$inputData["municipality"],
            "district"=>$inputData["district"],
            "property_id"=>$property->id
        ]);
        $basic->save();

        $amenity = new PropertyAmenity([
            "numberOfRoom"=>$inputData["numberOfRoom"],
            "floor"=>$inputData["floor"],
            "roadType"=>$inputData["roadType"],
            "furniture"=>$request["furniture"],
            "water"=>$request["water"],
            "bathroom"=>$request["bathroom"],
            "kitchen"=>$request["kitchen"],
            "internet"=>$request["internet"],
            "laundry"=>$request["laundry"],
            "parking"=>$request["parking"],
            "pet"=>$request["pet"],
            "property_id"=>$property->id
        ]);
        $amenity->save();

        $localFacility = new PropertyLocalfacility();
        $localFacility->gym = $gym;
        $localFacility->swimming = $swimming;
        $localFacility->hospital = $hospital;
        $localFacility->montessori = $montessori;
        $localFacility->gas = $gas;
        $localFacility->temple = $temple;
        $localFacility->resturants = $resturants;
        $localFacility->bank = $bank;
        $localFacility->bus = $bus;
        $localFacility->school = $school;
        $localFacility->park = $park;
        $localFacility->college = $college;
        $localFacility->market = $market;
        $localFacility->banquet = $banquet;
        $localFacility->property_id = $property->id;
        $localFacility->save();

        $image = new PropertyImage();
        $image->image1_path = $image1Path;
        $image->image2_path = $image2Path;
        $image->image3_path = $image3Path;
        $image->image4_path = $image4Path;
        $image->image5_path = $image5Path;
        $image->property_id = $property->id;
        $image->save();

        return "Record successfully updated in the database";
    }


    /* CHANGE/RESET PASSWORD */
    public function reset(Request $request){

        $user = auth()->user();

        $inputFields = $request->validate([
            "oldPassword"=>["required","string"],
            "newPassword"=>["required","string","min:8","max:16","confirmed"]
        ]);

        $inputFields["oldPassword"] = strip_tags($inputFields["oldPassword"]);
        $inputFields["newPassword"] = strip_tags($inputFields["newPassword"]);       

        //check if old password provided by user matches to the password in the database
        if(!Hash::check($inputFields["oldPassword"],$user->password)){
            return  "old password is incorrect"; 
        }

        $user->password = Hash::make($inputFields["newPassword"]);
        $user->save();

        auth()->logout();
        return redirect("/");
    }

    /* FETCH MY PROPERTY LISTINGS */
    public function show(){

        $userId = auth()->user()->id;
        $myPropertyList = DB::table("properties")
                            ->select("property_basics.*","property_amenities.*","property_localfacilities.*","property_images.*","properties.id")
                            ->join("property_basics","properties.id","=","property_basics.property_id")
                            ->join("property_amenities","properties.id","=","property_amenities.property_id")
                            ->join("property_localfacilities","properties.id","=","property_localfacilities.property_id")
                            ->join("property_images","properties.id","=","property_images.property_id")
                            ->where("user_id",$userId)
                            ->get();

        return view("userDashboard",["properties"=>$myPropertyList]);
    }


    /* DELETE MY PROPERTY LIST */
    public function delete(String $id){
        Property::where("id",$id)->delete();
        return redirect("/user-dashboard");
    }

    /* LOGOUT USER  */
    public function logout(){
        auth()->logout();
        return redirect("/");
    }
}
