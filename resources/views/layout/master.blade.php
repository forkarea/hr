<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HR - strona startowa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ URL::asset('css\style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css\hamburger.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css\animate.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js\script.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js\jquery.min.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ URL::asset('js\popper.min.js') }}"></script> --}}


</head>
	<body>

        
        @yield('content')

    <footer>
        <div class="footer">
            <div class="cnt-about-us-1200 footer-pos">
                <div class="footer-element footer-first">
                    <a href="mailto:mateusz@collectivehr.com">mateusz@collectivehr.com</a>
                </div>
                <div class="footer-element footer-second">
                    <a href="https://facebook.com" class="footer-facebook"></a>
                    <a href="https://linkedin.com" class="footer-linkedin"></a>
                </div>
                <div class="footer-element footer-third">
                    <a href="http://webmg.pl">WebMG</a>
                </div>
            </div>
        </div>
    </footer>
	</body>
</html>