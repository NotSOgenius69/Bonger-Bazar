<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://kit.fontawesome.com/fc988a088a.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
<div class="logincard">
    @include('admin.message')
    <h2 id="cardtitle">Login</h2>
    <form method="POST" action="{{ route('admin.authenticate') }}" class="form">
        @csrf
        <div class="input-field" id="namefield">
        <i class="fa-solid fa-user"></i>
        <input type="text" id="name" name="name" placeholder="Name">
        </div>
        <br>
        <div class="input-field">
        <i class="fa-solid fa-envelope"></i>
        <input type="email" id="email" name="email" placeholder="Email" required>
        </div>
        <br>
        <div class="input-field">
        <i class="fa-solid fa-lock"></i>
        <input type="password" id="password" name="password" placeholder="Password" required>
        </div>
        <br>
        <div class="btns">
        <button type="submit" class="active" id="loginbtn">Login</button>
        <button type="button" class="disabled-btn" id="signupbtn">Sign Up</button>
        </div>
    </form>       
</div>
<script>
    let namefield=document.getElementById("namefield");
    let cardtitle=document.getElementById("cardtitle");
    let loginbtn=document.getElementById("loginbtn");
    let signupbtn=document.getElementById("signupbtn");
    let namebox=document.getElementById("name");
    let close=document.getElementById("close");
    let alertbox=document.querySelector(".alert")

    close.onclick=()=>{
        alertbox.style.display ="none";
    }

     loginbtn.onclick=()=>{
        if(!loginbtn.classList.contains("active")){
            loginbtn.classList.add("active");
            signupbtn.classList.remove("active");
            signupbtn.type="button";
            namebox.required=!namebox.required;
        }
        else
        {
            loginbtn.type="submit";
        }
        namefield.style.maxHeight="0";
        cardtitle.innerHTML="Login";
        loginbtn.classList.remove("disabled-btn");
        signupbtn.classList.add("disabled-btn");
    }
    signupbtn.onclick=()=>{
        if(!signupbtn.classList.contains("active")){
            loginbtn.classList.remove("active");
            signupbtn.classList.add("active");
            loginbtn.type="button";
            namebox.required=!namebox.required;
        }
        else{
            signupbtn.type="submit";
        }
        namefield.style.maxHeight="4rem";
        cardtitle.innerHTML="Sign Up";
        signupbtn.classList.remove("disabled-btn");
        loginbtn.classList.add("disabled-btn");
    }

</script>
</body>
</html>