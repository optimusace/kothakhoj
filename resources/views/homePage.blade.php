@extends("layouts.appLayout1")

@section("title","Home")

@section("css")
    <link rel="stylesheet" href="css/homePage.css">
@endsection

@section("content")
    
    <div class="content">
        <div class="hot-deal">
            <p class="hot-deal-title">RECOMMNEDED</p>
            <div class="rooms hot-deal-rooms">

                @foreach ($recommendedProperty as $property)
                
                    <div class="room">
                        <a href="/property-detail/{{$property->id}}">
                            <div class="image-contents">     
                                <img src="{{asset("storage/".$property->image1_path)}}" >
                                <div class="img-hover-effects">
                                    <div class="shadow"></div>
                                    <div class="view-details">View Details</div>
                                    {{-- <div class="favourite-logo"><button><i class="fa-regular fa-heart"></i></button></div>  --}}             
                                </div>
                            </div>
                        </a>
                        <p class="title"> {{$property->title}} </p>
                        <p class="location"> {{$property->municipality}}-{{$property->ward}},{{$property->district}} </p>
                        <p class="price">Rs. {{$property->price}}/month</p>
                    </div>
                
                @endforeach


                {{-- <div class="move left-move"><i class="fa-solid fa-circle-chevron-left"></i></div>
                <a href="/room-detail/id">
                    <div class="room">
                        <img src="images/beautiful-home-2.jpg" >
                        <p class="title">Room on Rent</p>
                        <p class="location">Bharatpur-10,Chitwan</p>
                        <p class="price">Rs. 1200/month</p>
                        
                    </div>
                </a>
                
                <a href="/room-detail/id">
                    <div class="room">
                        <img src="images/beautiful-home-2.jpg" >
                        <p class="title">Room on Rent</p>
                        <p class="location">Bharatpur-10,Chitwan</p>
                        <p class="price">Rs. 1200/month</p>
                       
                    </div>
                </a>
                
                <a href="/room-detail/id">
                    <div class="room">
                        <img src="images/beautiful-home-2.jpg" >
                        <p class="title">Room on Rent</p>
                        <p class="location">Bharatpur-10,Chitwan</p>
                        <p class="price">Rs. 1200/month</p>
                        
                    </div>
                </a>
                <div class="move right-move"><i class="fa-solid fa-circle-chevron-right"></i></div> --}}

            </div>
            <div class="view-all"><a href="view-all/recommended"><p>View All</p></a></div>
        </div>
        <div class="recent">
            <p class="recent-title">RECENT</p>
            <div class="rooms">
                @foreach ($recentProperty as $property)

                    <div class="room">
                        <a href="/property-detail/{{$property->id}}">
                            <div class="image-contents">     
                                    <img src="{{asset("storage/".$property->property_image->image1_path)}}" >
                                    <div class="img-hover-effects">
                                        <div class="shadow"></div>
                                        <div class="view-details">View Details</div>
                                        {{-- <div class="favourite-logo"><button><i class="fa-regular fa-heart"></i></button></div>  --}}             
                                    </div>
                            </div>
                        </a>
                        <p class="title"> {{$property->property_basic->title}} </p>
                        <p class="location"> {{$property->property_basic->municipality}}-{{$property->property_basic->ward}},{{$property->property_basic->district}} </p>
                        <p class="price">Rs. {{$property->property_basic->price}}/month</p>
                    </div>

                @endforeach
            </div>
            <div class="view-all"><a href="view-all/recent"><p>View All</p></a></div>
        </div>
    </div>
    <div class="why-choose-us">
        <p class="title">Why Choose Us?</p>
        <div class="reasons">
            <div class="reason">
                <div class="reason-icon"><i class="fa-solid fa-heart"></i></div>
                <div class="reason-title">Comfortable</div>
                <div class="reason-describe">Enjoy lifestyle amenities designed to provide every homeowners </div>
            </div>
            <div class="reason">
                <div class="reason-icon"><i class="fa-solid fa-shield"></i></div>
                <div class="reason-title">Security</div>
                <div class="reason-describe">You can connect with potential tenants without having to share your phone number. </div>
            </div>
            <div class="reason">
                <div class="reason-icon"><i class="fa-solid fa-house-chimney-window"></i></div>
                <div class="reason-title">Wide Range of Properties</div>
                <div class="reason-describe">You can acess diffrent types of property
                    and We also validate their legitimacy.</div>
            </div>
            <div class="reason">
                <div class="reason-icon"><i class="fa-solid fa-money-bill"></i></div>
                <div class="reason-title">Best Price</div>
                <div class="reason-describe">Lowest possible cost and price. Comparision of a prices and between the property</div>
            </div>
        </div>        
    </div>

    <div class="about-us-small-section">
        <div class="about-us">
            <p class="about-us-heading">About Us</p>
            <p class="about-us-small-describe">Welcome to Kotha Khoj, your trusted partner in rental rooms. At Kotha Khoj, we're dedicated to making the process of finding and listing rental rooms easier, more convenient, and more efficient than ever before.</p>
            <p class="view-more"><a href="/about-us">View More</a></p>
        </div>
        <div class="about-us-site-logo">
            <img src="images/sitelogo.png">
        </div>
    </div>

    
@endsection

