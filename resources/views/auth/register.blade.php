<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset("css/signUp.css")}}">
</head>
<body>
    <div class="sign-up">
        <div class="sign-up-image">
            <img src="{{asset("images/sign-up -image.png")}}" alt="">
        </div>
        <div class="signUpForm">
            <p class="title">SIGN UP</p>
            <form action="/register" method="POST">
                @csrf
                <div>
                    <label for="fullName">Full Name</label>
                    <input type="text" placeholder="Your Full Name" id="fullName" name="name">
                    <p class="display-error"></p>
                </div>
    
                <div>
                    <label for="email">Email</label>
                    <input type="email" placeholder="Your Email Address" id="email" name="email">
                    <p class="display-error"></p>
                </div>
                
                <div>
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter Password" id="password" name="password">
                    <p class="display-error"></p>
                </div>
                
                <div>
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" id="confirmPassword" name="password_confirmation">
                    <p class="display-error"></p>
                </div>
    
                <input type="submit" value="Create Account">
                <p class="already-account">Already have an account?</p>
                <p class="link-login"><a href="/login">LOGIN</a></p>
            </form>
        </div>
    </div>
</body>
</html>