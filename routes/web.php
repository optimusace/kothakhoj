<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\CustomLoginController;


/* USER REGISTRATION AND LOGIN */
 
/*
Route::get("/login",[CustomLoginController::class,"showLoginForm"]);
Route::post("/login",[CustomLoginController::class,"login"]);
Route::get("/register",[CustomRegistrationController::class,"showRegistrationForm"]);
Route::post("/register",[CustomRegistrationController::class,"register"]);

 */

Auth::routes();

/* DASHBOARDs */

Route::get("/user-dashboard",[DashboardController::class,"show"])->middleware("auth");  //auth middleware - can only be accessed if user is logged in 
Route::post("/add-property",[DashboardController::class,"store"]);
Route::post("/password/reset",[DashboardController::class,"reset"]);
Route::delete("/property/delete/{id}",[DashboardController::class,"delete"]);
Route::get("/logout",[DashboardController::class,"logout"]);


/* HOME CONTROLLER */
Route::get("/",[HomeController::class,"showRecentAndRecommended"]);
Route::get("/view-all/recent",[HomeController::class,"viewAllRecent"]);
Route::get("/view-all/recommended",[HomeController::class,"viewAllRecommended"]);

/* CONTACT CONTROLLER */
Route::get("/contact-us",[ContactController::class,'show']);
Route::post("/contact-us",[ContactController::class,"sendEmail"]);

/* PROPERTY CONTROLLER */
Route::get("/property-detail/{id}",[PropertyController::class,"details"]);
Route::get("/check",[PropertyController::class,"check"]);


/* SEARCH AND FILTER */
Route::get("/search-and-filter",[SearchController::class,"filter"]);
Route::post("/search-and-filter",[SearchController::class,"searchResults"]);
//Route::get("/search-and-filter",[PropertyController::class,"check"]);

Route::get("/about-us",function(){
    return view("aboutUs");
});

Route::get("/appointment",function(){
    return view("appointment");
});

Route::get("/privacy-policy",function(){
    return view("privacyPolicy");
});

Route::get("/terms-and-condition",function(){
    return view("termsAndCondition");
});

Route::fallback(function(){
    return view("error404");
});


/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 */