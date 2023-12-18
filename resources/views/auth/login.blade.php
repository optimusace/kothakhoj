<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset("css/login.css")}}">
</head>
<body>
    <div class="login">
        <div class="login-image">
            <img src="{{asset("images/login-image.png")}}" alt="">
        </div>
        <div class="loginForm">
            <p class="login-heading">LOGIN</p>
            <P class="login-new-register">New to the site <a href="/register">Register Now</a> </P>
            <form action="/login" method="POST">
                @csrf
                <div class="inputs">
                    <label>Email</label>
                    <input type="email" placeholder="Email" name="email">
                </div>
                <div class="inputs">
                    <label for="Password">Password</label>
                    <input type="password" placeholder="Password" name="password">
                </div>
                <a href=""><p class="forgot-password">Forgot Password?</p></a>
                <p class="display-error"></p>
                <input type="submit" value="LOGIN" class="formSubmit">
            </form>
        </div>
    </div>
</body>
</html>