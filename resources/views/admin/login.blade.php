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
        <form method="POST" action="{{ route('admin.authenticate') }}" class="form" id="loginForm">
            @csrf
            <div class="input-field" id="namefield" style="max-height: 0;">
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
                <button type="button" id="signupbtn" class="disabled-btn">Sign Up</button>
            </div>
        </form>
        <form method="POST" action="{{ route('user.register') }}" class="form" id="registerForm" style="display: none;">
            @csrf
            <div class="input-field" id="namefield" style="max-height: 4rem;">
                <i class="fa-solid fa-user"></i>
                <input type="text" id="name" name="name" placeholder="Name" required>
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
                <button type="button" id="loginbtn" class="disabled-btn">Login</button>
                <button type="submit" class="active" id="signupbtn">Sign Up</button>
            </div>
        </form>
    </div>
    <script>
        let namefield = document.getElementById("namefield");
        let cardtitle = document.getElementById("cardtitle");
        let loginbtn = document.querySelectorAll("#loginbtn");
        let signupbtn = document.querySelectorAll("#signupbtn");
        let loginForm = document.getElementById("loginForm");
        let registerForm = document.getElementById("registerForm");

        loginbtn.forEach(btn => {
            btn.addEventListener("click", () => {
                loginForm.style.display = "block";
                registerForm.style.display = "none";
                loginbtn.forEach(btn => {
                    btn.classList.add("active");
                    btn.classList.remove("disabled-btn");
                });
                signupbtn.forEach(btn => {
                    btn.classList.remove("active");
                    btn.classList.add("disabled-btn");
                });
                namefield.style.maxHeight = "0";
                cardtitle.innerHTML = "Login";
            });
        });

        signupbtn.forEach(btn => {
            btn.addEventListener("click", () => {
                loginForm.style.display = "none";
                registerForm.style.display = "block";
                loginbtn.forEach(btn => {
                    btn.classList.remove("active");
                    btn.classList.add("disabled-btn");
                });
                signupbtn.forEach(btn => {
                    btn.classList.add("active");
                    btn.classList.remove("disabled-btn");
                });
                namefield.style.maxHeight = "4rem";
                cardtitle.innerHTML = "Sign Up";
            });
        });
    </script>
</body>
</html>