<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{asset("css/userDashboard.css")}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div id="header"></div>
    <div id="content">
        <div id="sideMenu">
            <p id="userImage"><i class='bx bxs-user-circle'></i></p>
            <p id="userName">{{auth()->user()->name}}</p>
            <li class="vTabs" onclick="showContent(event,'profile')" id="defaultOpen"><i class='bx bxs-user'></i>   Profile</li>
            <li class="vTabs" onclick="showContent(event,'addProperty')"><i class='bx bx-building-house'></i>Add Property</li>
            <li class="vTabs" onclick="showContent(event,'changePassword')"><i class='bx bxs-key'></i>Change Password</li>
            <li class="vTabs" onclick="showContent(event,'propertyListings')"><i class="fa-solid fa-list-ol"></i></i>My Property Listings</li>
            {{-- <li class="vTabs" onclick="showContent(event,'wishlist')"><i class='bx bx-heart'></i>WISHLIST</li> --}}
            <li class="vTabs" onclick="showContent(event,'logout')"><i class='bx bx-log-out'></i>LogOut</li>
        </div>
        
        <div id="sideMenuContents">

            <div class="siteLogo">
                <a href="/">
                    <img src="{{asset("images/siteLogo.png")}}" alt="rent a room logo" class="logo">
                </a>
            </div>
           
            <div class="vTabContent" id="profile">
               <div class="profileContents">
                    <form action="" method="POST">
                        <div class="pd-box">
                            <p class="pd-heading">Personal Details</p>
                            <img src="../images/sitelogo.png" class="pd-image" name="profileImage">
                            <button class="pd-image-btn">Add Photo</button>
                            <input type="text" class="pd-userinfo" placeholder="Full Name" name="name" value="{{auth()->user()->name}}">
                          {{--     <input type="text" class="pd-userinfo" placeholder="Contact Number" name="contact" value="{{auth()->user()->contact}}">
                          <input type="text" class="pd-userinfo" placeholder="Email" name="email" value="{{auth()->user()->email}}">
                         --}}
                            <p class="email">{{auth()->user()->email}}</p>
                        </div>
                        <p class="profile-role">Who are you?</p>
                        <div class="profile-role-options">
                            <input type="radio" name="role" value="landlord">
                            <label for="">Landlord</label>
                            <input type="radio" name="role" value="lessee">
                            <label for="">Lessee</label>
                        </div>
                        <input type="submit" value="UPDATE" id="submitUpdatedValue">
                    </form>
               </div>
            </div>

            <div class="vTabContent" id="changePassword">
                <div class="cp-contents">   <!-- cp - change password -->
                    <div class="resetForm">
                        <p>Change Password</p>
                        <form action="/password/reset" method="POST" class="resetPassword">
                            @csrf
                            <input type="text" placeholder="Old Password" name="oldPassword">
                            <input type="text" placeholder="New Password" name="newPassword">                         
                            <input type="text" placeholder="Confirm New Password" name="newPassword_confirmation">
                            <input type="submit" value="UPDATE">
                        </form>
                    </div>
                </div>    
            </div>

            <div class="vTabContent" id="addProperty">
                <h2>Add a New Property</h2>
                <form class="property-form" method="POST" action="/add-property" enctype="multipart/form-data">
                    
                    @csrf
                    
                    <!-- BASIC DETAILS -->
                    <div class="basic-details">
                        <div class="basic-details-title"><span>1</span> Basic Details</div>
                        <div class="basic-details-input">
                            <div class="basic title">
                                <label for="">Title</label>
                                <input type="text" name="title">
                            </div>
                            <div class="basic category">
                                <label for="">Cateogory</label>
                                <select name="category" id="">
                                    <option value="" selected disabled>Cateogory</option>
                                    <option value="single room">Single Room</option>
                                    <option value="double room">Double Room</option>
                                    <option value="flat">Flat</option>
                                    <option value="bunglow">Bunglow</option>
                                    <option value="housing">Housing</option>
                                </select>
                            </div>
                            <div class="basic room-price">
                                <label for="">Price per month (Rs.)</label>
                                <input type="text" name="price">
                            </div>
                            <div class="basic price-negotation">
                                <label for="">Price negotiation</label>
                                <select name="negotiation" id="">
                                    <option value="1">Negotiable</option>
                                    <option value="0">Not Negotiable</option>
                                </select>
                            </div>
                            <div class="basic contact">
                                <label for="">Contact</label>
                                <input type="text" name="contact">
                            </div>
                            
                            <div class="basic ward">
                                <label for="">Ward</label>
                                <input type="text" name="ward">
                            </div>
                            <div class="basic municipality">
                                <label for="">Municipality</label>
                                <input type="text" name="municipality">
                            </div>
                            <div class="basic district">
                                <label for="">District</label>
                                <input type="text" name="district">
                            </div>
                            
                        </div>
                    </div>

                    <!-- AMENITIES -->
                    <div class="amenities">
                        <div class="amenities-title"><span>2</span>Amenities</div>
                        <div class="amenities-input">
                            <div class="amenity numberOfRoom">
                                <label for="">Number of room</label>
                                <input type="text" name="numberOfRoom">
                            </div>
                            <div class="amenity floor">
                                <label for="">Floor</label>
                                <select name="floor" id="">
                                    <option value="0">Ground Floor</option>
                                    <option value="1">First Floor</option>
                                    <option value="2">Second Floor</option>
                                    <option value="3">Third Floor</option>
                                    <option value="4">Fourth Floor</option>
                                    <option value="5">Fifth Floor</option>
                                </select>
                            </div>
                            <div class="amenity roadType">
                                <label for="">Road Type</label>
                                <select name="roadType" id="">
                                    <option value="asphalt">Asphalt</option>
                                    <option value="gravel">Gravel</option>
                                </select>
                            </div>
                            <div class="amenity furniture">
                                <label for="">Furniture</label>
                                <select name="furniture" id="">
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                            
                            <div class="amenity water">
                                <label for="">Water Facility</label>
                                <select name="water" id="">
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                            
                            <div class="amenity bathroom">
                                <label for="">Bathroom</label>
                                <select name="bathroom" id="">
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                            
                            <div class="amenity kitchen">
                                <label for="">Kitchen</label>
                                <select name="kitchen" id="">
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                            <div class="amenity internet">
                                <label for="">Internet</label>
                                <select name="internet" id="">
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                            
                            <div class="amenity laundry">
                                <label for="">Laundry Service</label>
                                <select name="laundry" id="">
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                            
                            <div class="amenity parking">
                                <label for="">Parking</label>
                                <select name="parking" id="">
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                            
                            <div class="amenity pet">
                                <label for="">Pet Friendly</label>
                                <select name="pet" id="">
                                    <option value="1">Friendly</option>
                                    <option value="0">Not Friendly</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- LOCAL AREA FACILITIES -->
                    <div class="local-area-facilities">
                        <div class="local-area-facilities-title"> <span>3</span> Local Area Facilities</div>
                        <p>Mark/Select the facilitites that are within the 5km of property</p>
                        <div class="local-facilities">
                            <div class="facility">
                                <input type="checkbox" name="gym" value="1">
                                <label for="">GYM</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="swimming" value="1">
                                <label for="">Swimming Pool</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="hospital" value="1">
                                <label for="">Hospital</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="montessori" value="1">
                                <label for="">Montessori</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="gas" value="1">
                                <label for="">Gas Station</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="temple" value="1">
                                <label for="">Temple</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="resturants" value="1">
                                <label for="">Resturants</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="bank" value="1">
                                <label for="">Bank</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="bus" value="1">
                                <label for="">Bus Station</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="school" value="1">
                                <label for="">School</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="park" value="1">
                                <label for="">Park</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="college" value="1">
                                <label for="">College</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="market" value="1">
                                <label for="">Super Market</label>
                            </div>
                            <div class="facility">
                                <input type="checkbox" name="banquet" value="1">
                                <label for="">Banquet Hall</label>
                            </div>
                        </div>
                    </div>

                    <div class="property-images">
                        <div class="property-images-title"> <span>4</span> Upload photos</div>
                        <div class="photos">
                            <div class="photo">
                                <input type="file" name="image1" id="image1" onchange="showChoosenImage('image1','showImage1')">
                                <img src="" id="showImage1" alt="" class="displayImage">
                            </div>
                            <div class="photo">
                                <input type="file" name="image2" id="image2" onchange="showChoosenImage('image2','showImage2')">
                                <img src="" id="showImage2" alt="" class="displayImage">
                            </div>
                            <div class="photo">
                                <input type="file" name="image3" id="image3" onchange="showChoosenImage('image3','showImage3')">
                                <img src="" id="showImage3" alt="" class="displayImage">
                            </div>
                            <div class="photo">
                                <input type="file" name="image4" id="image4" onchange="showChoosenImage('image4','showImage4')">
                                <img src="" id="showImage4" alt="" class="displayImage">
                            </div>
                            <div class="photo">
                                <input type="file" name="image5" id="image5" onchange="showChoosenImage('image5','showImage5')">
                                <img src="" id="showImage5" alt="" class="displayImage">
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Add New Property" id="submit-property-data">
                </form>
                
            </div>

            <div class="vTabContent" id="propertyListings">
                <h2>My Property</h2>
                
                <div class="rooms">
                    @foreach ($properties as $property)
                    
                        <div class="room">
                            <a href="/property-detail/{{$property->id}}">
                                <div class="image-contents">     
                                        <img src="{{asset("storage/".$property->image1_path)}}" >
                                        <div class="img-hover-effects">
                                            <div class="shadow"></div>
                                            <div class="view-details">View Details</div>
                                            {{-- <div class="favourite-logo"><button><i class="fa-regular fa-heart"></i></button></div> --}}              
                                        </div>
                                    </div>
                                </a>
                            <p class="title"> {{$property->title}} </p>
                            <p class="location"> {{$property->municipality}}-{{$property->ward}},{{$property->district}} </p>
                            <p class="price">Rs. {{$property->price}}/month</p>
                            <form action="/property/delete/{{$property->id}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn-delete"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>   

                    @endforeach
                </div>

            </div>


            {{-- <div class="vTabContent" id="wishlist">
                <div class="wl-contents">   <!-- wl - wish list -->
                    <p class="wl-title">WISHLISTS</p>
                    <div class="rooms">
                        <a href="/room-detail/id">
                            <div class="room">
                                <img src="../images/beautiful-home-2.jpg" >
                                <p class="title">Room on Rent</p>
                                <p class="location">Bharatpur-10,Chitwan</p>
                                <p class="price">Rs. 1200/month</p>
                                <div class="facilities">
                                    <p class="parking"><i class="fa-solid fa-square-parking"></i> 3</p>
                                    <p class="bathroom"><i class="fa-solid fa-bath"></i> 2</p>
                                </div>
                            </div>
                        </a>
                        <a href="/room-detail/id">
                            <div class="room">
                                <img src="../images/beautiful-home-2.jpg" >
                                <p class="title">Room on Rent</p>
                                <p class="location">Bharatpur-10,Chitwan</p>
                                <p class="price">Rs. 1200/month</p>
                                <div class="facilities">
                                    <p class="parking"><i class="fa-solid fa-square-parking"></i> 3</p>
                                    <p class="bathroom"><i class="fa-solid fa-bath"></i> 2</p>
                                </div>
                            </div>
                        </a>
                        <a href="/room-detail/id">
                            <div class="room">
                                <img src="../images/beautiful-home-2.jpg" >
                                <p class="title">Room on Rent</p>
                                <p class="location">Bharatpur-10,Chitwan</p>
                                <p class="price">Rs. 1200/month</p>
                                <div class="facilities">
                                    <p class="parking"><i class="fa-solid fa-square-parking"></i> 3</p>
                                    <p class="bathroom"><i class="fa-solid fa-bath"></i> 2</p>
                                </div>
                            </div>
                        </a>
                        <a href="/room-detail/id">
                            <div class="room">
                                <img src="../images/beautiful-home-2.jpg" >
                                <p class="title">Room on Rent</p>
                                <p class="location">Bharatpur-10,Chitwan</p>
                                <p class="price">Rs. 1200/month</p>
                                <div class="facilities">
                                    <p class="parking"><i class="fa-solid fa-square-parking"></i> 3</p>
                                    <p class="bathroom"><i class="fa-solid fa-bath"></i> 2</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> --}}

            
            <div class="vTabContent" id="logout">
                <h2>LogOut</h2>
                <a href="/logout"><p>Logout</p></a>
            </div>
        </div>
    </div>
    <div id="footer"></div>
</body>

<script src="{{asset("js/userDashboard.js")}}"></script>

</html>