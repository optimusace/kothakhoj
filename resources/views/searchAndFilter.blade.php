@extends("layouts.appLayout2")

@section("title","Search and Filter")

@section("css")
    <link rel="stylesheet" href="css/searchAndFilter.css">
@endsection 


@section("content")

 <!-- IMAGE BELOW MENU -->
 <img src="images/search-filter.png" alt="" class="below-menu-image">

 <!-- CONTENT HTML CODE  -->
 <div class="content">
     <div class="filter-section">
         <p class="filter-section-heading">Properties Filter</p>

         <!-- FILTER FORM -->
         <form action="/search-and-filter" method="GET" class="filter-form">

             <div class="choose-location">
                 <label for="">Choose Ward</label>
                 <select name="ward" id="location">
                     <option value="8">8</option>
                     <option value="9">9</option>
                     <option value="10">10</option>
                     <option value="11">11</option>
                     <option value="12">12</option>
                     <option value="13">13</option>
                 </select>
             </div>

             <div class="price-range">
                 <label for="">Price Range (Rs.)</label>
                 <input type="range" name="price" min="1000" max="50000">
                 <div class="price">
                     <p>1000</p>
                     <p>50000</p>
                 </div>
             </div>

             <div class="property-type">
                 <label for="">Properties Type</label>
                 <div class="types-of-property">
                     <div class="type1">
                         <input type="radio" name="category" value="single room">
                         <label for="">Single Room</label>
                     </div>
                     <div class="type2">
                         <input type="radio" name="category" value="double room">
                         <label for="">Double Room</label>
                     </div>
                     <div class="type3">
                         <input type="radio" name="category" value="flat">
                         <label for="">Flat</label>
                     </div>
                     <div class="type4">
                        <input type="radio" name="category" value="bunglow">
                        <label for="">Bunglow</label>
                    </div>
                    <div class="type5">
                        <input type="radio" name="category" value="housing">
                        <label for="">Housing</label>
                    </div>
                 </div>
             </div>

             <div class="road-type">
                 <label for="">Road Type</label>
                 <div class="types-of-road">
                     <div class="road-type1">
                         <input type="radio" value="asphalt" name="roadType">
                         <label for="">Ashpalt</label>
                     </div>
                     <div class="road-type2">
                         <input type="radio" value="gravel" name="roadType">
                         <label for="">Gravel</label>
                     </div>
                 </div>
             </div>

             <div class="floor">
                 <label for="">Floor</label>
                 <div class="floors">
                     <div class="floor0">
                         <input type="radio" value="0" name="floor">
                         <label for="">Ground Floor</label>
                     </div>
                     <div class="floor1">
                         <input type="radio" value="1" name="floor">
                         <label for="">First Floor</label>
                     </div>
                     <div class="floor2">
                         <input type="radio" value="2" name="floor">
                         <label for="">Second Floor</label>
                     </div>
                     <div class="floor3">
                         <input type="radio" value="3" name="floor">
                         <label for="">Third Floor</label>
                     </div>
                     <div class="floor4">
                         <input type="radio" value="4" name="floor">
                         <label for="">Fourth Floor</label>
                     </div>
                     <div class="floor5">
                        <input type="radio" value="5" name="floor">
                        <label for="">Fifth Floor</label>
                    </div>
                 </div>
             </div>
             
             <div class="submit">
                 <input type="submit" value="Apply Filter">
             </div>
         </form>
     </div>

     <div class="result-section">
         <div class="result-top-bar">
             <p>{{count($searchResults)}} Result Found</p>
             <div class="result-sort">
                 <p>Sort By</p>
                 <select>
                     <option value="">Random</option>
                     <option value="">High to Low</option>
                     <option value="">Low to High</option>
                 </select>
             </div>
         </div>
         <div class="result-section-content">
             <div class="rooms">

                @foreach ($searchResults as $result)
                <a href="/property-detail/{{$result->id}}">
                    <div class="room">
                        <div class="image-contents">     
                                <img src="{{asset("storage/".$result->image1_path)}}" >
                                <div class="img-hover-effects">
                                    <div class="shadow"></div>
                                    <div class="view-details">View Details</div>
                                    {{-- <div class="favourite-logo"><button><i class="fa-regular fa-heart"></i></button></div> --}}              
                                </div>
                            </div>
                        <p class="title"> {{$result->title}} </p>
                        <p class="location"> {{$result->municipality}}-{{$result->ward}},{{$result->district}} </p>
                        <p class="price">Rs. {{$result->price}}/month</p>
                    </div>
                </a>
                @endforeach

             </div>
         </div>
     </div>
 </div>
 

@endsection