<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css\style.css') }}">
    <title>HR error page</title>
</head>
<body style="background-color:#342643;">
    
<div class="background-center">
    <div class="error">404</div>
    <div class="error-text">
        Oops, the page you're looking for doesn't exist.
    </div>

<div class="error-btn-back">
    <a href="{{ url('/') }}">GO TO HOMEPAGE</a>
</div>

</div>

</body>
</html>