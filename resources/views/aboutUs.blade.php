@extends("layouts.appLayout2")

@section("title","About Us")

@section("css")
    <link rel="stylesheet" href="css/aboutUs.css">
@endsection 

@section("content")

    <div class="content">
        <p class="content-title">About Us</p>
        <div class="content-img"><img src="images/about-us-image.png" alt=""></div>
        <div class="aboutus-description">
            <p>Welcome to Khotha Khoj, your premier destination for hassle-free room rentals! We understand that finding the perfect room can be a daunting task, but we're here to simplify the process and make it an enjoyable experience for you.</p>
            <p class="ourStory">Our Story</p>
            <p class="ourStory-description">
                At Khotha Khoj, we believe that where you live plays a significant role in shaping your life's experiences. Whether you're a student looking for a cozy space near your university, a young professional searching for a comfortable yet affordable apartment, or a traveler seeking a home away from home, we've got you covered.
                <br><br>
                Our journey began with a simple idea: to connect renters with their ideal living spaces effortlessly. We realized that finding the right room should be a breeze, so we set out to create a platform that streamlines the process.
            </p>
            <p class="ourVision">Our Vision</p>
            <p class="ourVision-description">
                Our vision is to revolutionize the way people find and rent rooms. We aim to create a seamless and enjoyable experience for both renters and property owners. Whether you're a landlord looking to list your property or a renter seeking the perfect room, Khotha Khoj is here to make your journey smooth and rewarding.
                <br> Join the Khotha Khoj Community
            </p>    
        </div>
        <p class="developer">Member</p>
        <div class="members">
            <div class="member">
                <img src="images/soapnil-photo.png" class="member-image">
                <p class="member-name">Soapnil Bogati</p>
                <p class="member-role">BCA@oxfordCollege</p>
                <p class="member-social-platform"><a href=""><i class="fa-brands fa-linkedin"></i></a><a href=""><i class="fa-brands fa-facebook"></i></a><a href=""><i class="fa-brands fa-instagram"></i></a></p>
            </div>
            <div class="member">
                <img src="images/shirshak-photo.jpg" class="member-image">
                <p class="member-name">Shirshak Khadka</p>
                <p class="member-role">BCA@oxfordCollege</p>
                <p class="member-social-platform"><a href=""><i class="fa-brands fa-linkedin"></i></a><a href=""><i class="fa-brands fa-facebook"></i></a><a href=""><i class="fa-brands fa-instagram"></i></a></p>
            </div>
            <div class="member">
                <img src="images/suman-photo.png" class="member-image">
                <p class="member-name">Suman Panta</p>
                <p class="member-role">BCA@oxfordCollege</p>
                <p class="member-social-platform"><a href=""><i class="fa-brands fa-linkedin"></i></a><a href=""><i class="fa-brands fa-facebook"></i></a><a href=""><i class="fa-brands fa-instagram"></i></a></p>
            </div>
        </div>
    </div>

@endsection