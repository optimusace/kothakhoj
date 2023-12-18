@extends("layouts.appLayout1")

@section("title","View All")

@section("css")
    <link rel="stylesheet" href="{{ asset('css/viewAllPage.css') }}">
@endsection


@section("content")

    <div class="content">
        <p class="content-heading">VIEW ALL PROPERTY</p>
        <div class="rooms">
            @foreach ($allProperties as $property)
            
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
                </div>
            
            @endforeach   
        </div>
    </div>

@endsection