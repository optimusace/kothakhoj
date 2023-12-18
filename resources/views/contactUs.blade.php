@extends("layouts.appLayout2")

@section("title","Contact Us")

@section("css")
    <link rel="stylesheet" href="css/contactUs.css">
@endsection


@section("content")

<div class="content">
    <p class="heading">Contact Us</p>
    <div class="contact-body">
        <div class="contact-details">
            <p><i class="fa-solid fa-location-dot"></i>Narayangadh,Chitwan,Nepal</p>
            <p><i class="fa-solid fa-envelope"></i>khothakhoj@gmail.com</p>
            <p><i class="fa-solid fa-phone"></i>+977-9876543210</p>
            <div class="map">
                <img src="../images/google-map-image.png" alt="">
            </div>
        </div>
        <div class="contact-form">
            <form action="/contact-us" method="POST">
                @csrf
                <input type="text" placeholder="Name" name="name" id="name" required>
                <input type="email" placeholder="Email" name="email" id="email" required>
                <textarea name="message" cols="30" rows="8" id="message" placeholder="Message....." required></textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
@endsection