<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show(){
        return view("contactUs");
    }   

    public function sendEmail(Request $request){
        $formData = $request->validate([
            "name"=>"required",
            "email"=>["required","email"],
            "message"=>"required"
        ]);

        $formData["name"] = strip_tags($formData["name"]);
        $formData["email"] = strip_tags($formData["email"]);
        $formData["message"] = strip_tags($formData["message"]);

        Mail::to("khothakhoj@email.com")->send(new ContactUsMail($formData));

        return redirect("/contact-us")->with("successfully send your message");

    }

}
