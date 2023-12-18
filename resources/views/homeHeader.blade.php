<div class="header">
    <div class="header-second-backgrounds">
        <div class="menu">
            <div class="menu-logo"><a href="/"><img src="{{asset("images/sitelogo.png")}}" alt=""></a></div>
            
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about-us">About Us</a></li>
                <li><a href="/contact-us">Contact Us</a></li>
            </ul>

            @if (auth()->check())
                <a href="/user-dashboard">
                 <div class="user-details">
                     <p class="name">{{auth()->user()->name}}</p>
                     <p class="email">{{auth()->user()->email}}</p>
                 </div>
                </a>
            @else
                <div class="login-register">
                    <p class="login"><a href="/login">Login</a></p>
                    <p class="register"><a href="/register">Register</a></p>
                </div>
            @endif
        </div>
        <p class="motto">Your Dream Room, Just a Click Away</p>
        <div class="search-bar">
            <form action="/search-and-filter" method="POST">
                @csrf
                <input type="text" placeholder="Search By Title" name="title">
                <input type="text" placeholder="Search For Location" name="location">
                <input type="submit" value="Search">
            </form>
        </div>
    </div>
</div>