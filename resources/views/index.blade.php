<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/fc988a088a.js" crossorigin="anonymous"></script>
    <title>Bonger Bazar</title>
</head>
<body>
    <header>
        <!--navigation bar-->
        <a href="#" class="logo"><img src="{{ asset('images/logo.png') }}" alt="Bonger Bazar" width="220px" height="40px"></a>
       <nav class="navbar">
          <button type="button" class="loginbutton" onclick="window.location='{{ route('admin.login') }}'">Sign In</button>
      </nav>
    </header>
</body>
</html>