@extends("layouts.appLayout2")

@section("title","Property Details")

@section("css")
    <link rel="stylesheet" href="{{asset('css/propertyDetails.css')}}">
@endsection

@section("content")

    <!-- BODY CONTENT -->
    <!-- DIFFERENT DETAILS OF THE PROPERTY -->
    <div class="details">
        <p class="details-heading">PROPERTY DETAILS</p>

        <div class="property-images">
            <div class="image-slides">
                <img src="{{asset("storage/".$details->property_image->image1_path)}}" class="slide" alt="">
                <img src="{{asset("storage/".$details->property_image->image2_path)}}" class="slide" alt="">
                <img src="{{asset("storage/".$details->property_image->image3_path)}}" class="slide" alt="">
                <img src="{{asset("storage/".$details->property_image->image4_path)}}" class="slide" alt="">
                <img src="{{asset("storage/".$details->property_image->image5_path)}}" class="slide" alt="">
            </div>
            <div class="image-columns">
                <img src="{{asset("storage/".$details->property_image->image1_path)}}" class="column" alt="" onclick="showSlide(1)">
                <img src="{{asset("storage/".$details->property_image->image2_path)}}" class="column" alt="" onclick="showSlide(2)">
                <img src="{{asset("storage/".$details->property_image->image3_path)}}" class="column" alt="" onclick="showSlide(3)">
                <img src="{{asset("storage/".$details->property_image->image4_path)}}" class="column" alt="" onclick="showSlide(4)">
                <img src="{{asset("storage/".$details->property_image->image5_path)}}" class="column" alt="" onclick="showSlide(5)">
               
            </div>
        </div>

        <div class="property-details">
            <div class="details-location-added-on">
                <p class="location">{{$details->property_basic->municipality}}-{{$details->property_basic->ward}},{{$details->property_basic->district}}</p>
                <p class="added-on">Added On : {{$details->created_at->format("M d ,Y")}} </p>
             </div>
     
             <!-- amenities -->
             <div class="amenities-details">
                 <div class="amenities-details-heading">Basics & Amenities</div>
                 <div class="amenities">
                     

                     <div class="amenity number-of-rooms">
                         <p class="amenity-heading">Number of rooms</p>
                         <p class="number">{{$details->property_amenity->numberOfRoom}}</p>
                     </div>
                     <div class="amenity floor">
                        <p class="amenity-heading">Floor</p>
                        @if (($details->property_amenity->floor)==0)
                            <p class="floor-number">Ground Floor</p>
                        @elseif (($details->property_amenity->floor)==1)
                            <p class="floor-number">First Floor</p>
                        @elseif (($details->property_amenity->floor)==2)
                            <p class="floor-number">Second Floor</p>
                        @elseif (($details->property_amenity->floor)==3)
                            <p class="floor-number">Third Floor</p>
                        @elseif (($details->property_amenity->floor)==4)
                            <p class="floor-number">Fourth Floor</p>
                        @else
                            <p class="floornumber">Fifth Floor</p>
                        @endif
                        
                     </div>
                     <div class="amenity road">
                        <p class="amenity-heading">Road Type</p>
                        <p class="road-type">{{ucfirst($details->property_amenity->roadType)}}</p>
                     </div>
                     <div class="amenity furniture">
                        <p class="amenity-heading">Furniture</p>
                        @if (($details->property_amenity->furniture) == 1)
                        <p class="furniture-detail">Available</p>
                        @else
                        <p class="furniture-detail">Not Available</p>
                        @endif
                    </div>
                    <div class="amenity water">
                        <p class="amenity-heading">Water Facility</p>
                        @if (($details->property_amenity->water) == 1)
                        <p class="water-detail">Available</p>
                        @else
                        <p class="water-detail">Not Available</p>
                        @endif
                    </div>
                     <div class="amenity internet">
                        <p class="amenity-heading">Internet</p>
                        @if (($details->property_amenity->internet) == 1)
                        <p class="internet-detail">Available</p>
                        @else
                        <p class="internet-detail">Not Available</p>
                        @endif
                    </div>
                    <div class="amenity kitchen">
                        <p class="amenity-heading">Kitchen</p>
                        @if (($details->property_amenity->kitchen) == 1)
                        <p class="kitchen-detail">Available</p>
                        @else
                        <p class="kitchen-detail">Not Available</p>
                        @endif
                    </div>
                    <div class="amenity laundry">
                        <p class="amenity-heading">Laundry</p>
                        @if (($details->property_amenity->laundry) == 1)
                        <p class="laundry-detail">Available</p>
                        @else
                        <p class="laundry-detail">Not Available</p>
                        @endif
                    </div>
                     <div class="amenity parking">
                         <p class="amenity-heading">Parking</p>
                         @if (($details->property_amenity->parking) == 1)
                         <p class="parking-detail">Available</p>
                         @else
                         <p class="parking-detail">Not Available</p>
                         @endif
                     </div>
                     <div class="amenity bathroom">
                        <p class="amenity-heading">Bathroom</p>
                        @if (($details->property_amenity->bathroom) == 1)
                        <p class="bathroom-detail">Available</p>
                        @else
                        <p class="bathroom-detail">Not Available</p>
                        @endif
                    </div>
                    <div class="amenity pet">
                        <p class="amenity-heading">Pet Friendly</p>
                        @if (($details->property_amenity->pet) == 1)
                        <p class="pet-detail">Friendly</p>
                        @else
                        <p class="pet-detail">Not Friendly</p>
                        @endif
                    </div>
                     
                 </div>
             </div>
     
             <!-- local area facilities -->
             <div class="local-area-facilities-details">
                 <div class="facilities-heading">Local Area Facilities</div>
                 <div class="property-facilities">
                     <div class="facility">
                        @if (($details->property_local_facility->gym)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                        <div class="facility-name">GYM</div>
                     </div>
                     <div class="facility">
                        @if (($details->property_local_facility->swimming)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                         <div class="facility-name">Swimming Pool</div>
                     </div>
                     <div class="facility">
                        @if (($details->property_local_facility->hospital)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                        <div class="facility-name">Hospital</div>
                     </div>
                     <div class="facility">
                        @if (($details->property_local_facility->montessori)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                         <div class="facility-name">Montessori</div>
                     </div>
                     <div class="facility">
                        @if (($details->property_local_facility->gas)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                         <div class="facility-name">Gas Station</div>
                     </div>
                     <div class="facility">
                        @if (($details->property_local_facility->temple)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                         <div class="facility-name">Temple</div>
                     </div>
                     <div class="facility">
                        @if (($details->property_local_facility->resturants)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                         <div class="facility-name">Resturants</div>
                     </div>
                     <div class="facility">
                        @if (($details->property_local_facility->bank)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                         <div class="facility-name">Bank</div>
                     </div>
                     <div class="facility">
                        @if (($details->property_local_facility->bus)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                         <div class="facility-name">Bus Stop</div>
                     </div>
                     <div class="facility">
                        @if (($details->property_local_facility->school)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                         <div class="facility-name">School</div>
                     </div>
                     <div class="facility"> 
                        @if (($details->property_local_facility->park)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                         <div class="facility-name">Park</div>
                     </div>
                     <div class="facility">
                        @if (($details->property_local_facility->college)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                         <div class="facility-name">College</div>
                     </div>
                     <div class="facility">
                        @if (($details->property_local_facility->market)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                         <div class="facility-name">Super Market</div>
                     </div>
                     <div class="facility"> 
                        @if (($details->property_local_facility->banquet)==1)
                            <div class="facility-availability" style="background-color: #38af85"></div>
                        @else
                            <div class="facility-availability"></div>
                        @endif
                         <div class="facility-name">Banquet Hall</div>
                     </div>
                 </div>
             </div>
     
             <div class="price-appointment">
                <p>PRICE PER MONTH</p>
                <p>
                    Rs. {{$details->property_basic->price}} 
                    @if (($details->property_basic->negotiation)==1)
                        (Negotiable)
                    @else
                        (Not Negotiable)
                    @endif
                </p>
                <button>APPOINTMENT</button>
                <p>OR</p>
                <p><i class="fa-solid fa-phone"></i>{{$details->property_basic->contact}}</p>
             </div>
        </div>
    </div>


    <!-- SIMILAR PORPERTIES -->
    <div class="similar-properties">
        <p class="similar-properties-heading">Similar Properties</p>
        <div class="rooms">

            @foreach ($similar as $property)
            
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
                    <p class="title">{{$property->title}}</p>
                    <p class="location">{{$property->municipality}}-{{$property->ward}},{{$property->district}}</p>
                    <p class="price">Rs. {{$property->price}}/month</p>
                </div>
            
            @endforeach

        </div>
    </div>
@endsection


@section("script")
    <script src="{{asset("js/propertyDetails.js")}}"></script>
@endsection