<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HR - strona startowa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>

    {{-- <link rel="stylesheet" href="{{ URL::asset('css\style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css\hamburger.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css\animate.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js\script.js') }}"></script> --}}


    {{-- min --}}
    <link rel="stylesheet" href="{{ URL::asset('css\style.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css\hamburger.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css\animate.min.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js\script.min.js') }}"></script>

</head>
	<body>
        <div id="cookieAll" class="cookie-cnt">
            <div class="cookie-pos">
                <div class="cookie-flex">
                    <div class="cookie-txt">
                        We use cookies on this site to enhance your user experience.
                    </div>
                    <div class="">
                        <button id="btnCookie" class="cookie-btn submit-btn">Ok, I agree</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="background-top">
            <div class="inner">
                <div class="menu-cnt">
                    <div id="fixedMenu">
                        <div>
                            <a href="{{url('/')}}">
                                <img src="{{ asset('img/logo.png') }}" class="menu-logo">
                            </a>
                        </div>
                        <div class="menu-hidden menu-list" id="menuList">
                            <ul class="menu-ul">
                                <li class="menu-ul-li"><a class="menu-href" href="{{ url('#about') }}">About Us</a></li>
                                <li class="menu-ul-li"><a class="menu-href" href="{{ url('#fot_it_teams') }}">Fot IT Teams</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="hamburger-center">
                        <button class="hamburger hamburger--collapse" type="button" aria-label="Menu" aria-controls="navigation" id="buttonHamburger">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>

                <div class="background-top-center">
                    <div class="background-top-center-color">
                        <div class="background-top-center-text">
                            LOOKING FOR A DEVELOPER ?
                        </div>
                    </div>
                    <div class="background-small-text animatable zoomInDown">WE WILL FIND YOU SUITABLE CANDIDATE IN 3 DAYS</div>
                </div>
                <div class="btn-fron-page-pos animatable zoomInUp">
                    <a href="{{ url('#fot_it_teams') }}" class="btn-fron-page">JUST TRY US</a>
                </div>
                <div class="button-down">
                    <a href="#about">
                        <img id="scrool-down" src="{{ asset('img/scrool_down.png') }}">
                    </a>
                </div>
            </div>
        </div>

        <div id="fixedMenuAdd"></div>
            <div class="page-content">

            <div class="about-cnt background-about">
            <div class="cnt-about-us-1200">
                <div class="big-title animatable tada">
                    <a class="anchor" name="about">ABOUT</a>
                </div>
                <div class="about-us-desc animatable rubberBand">
                    WE DO RECRUITMENT. QUICKLY AND EFFECTIVELY
                </div>

                <div class="line-pos">
                    <div class="line-vertical">
                        <div class="line-draw"></div>
                    </div>
                </div>

                <div class="about-line">
                    <div class="about-element-pos">

                        <div class="circle-element"></div>
                        <div class="timeline-element animatable zoomIn">
                            <div class="timeline-element-title">
                                1 DAY
                            </div>
                            <div class="timeline-element-desc">
                                You are sending us description of vacancy
                            </div>
                        </div>
                        <div class="circle-element circle-element-two"></div>
                        <div class="timeline-element timeline-element-two animatable zoomIn">
                            <div class="timeline-element-title">
                                2 DAY
                            </div>
                            <div class="timeline-element-desc">
                                We are contacting with you to get every important detail
                            </div>
                        </div>
                        <div class="circle-element circle-element-three"></div>
                        <div class="timeline-element timeline-element-three animatable zoomIn">
                            <div class="timeline-element-title">
                                3 DAY
                            </div>
                            <div class="timeline-element-desc">
                                You are receiving profiles of suitable candidates
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="background-about-us">
                <div class="cnt-about-us-1200">
                    <div class="big-title animatable slideInUp">
                        ABOUT US
                    </div>
                    <div class="person-box-all">
                    <?php
                    if (count($getRecommendationWorker) > 0) {
                        for ($i = 0; $i < count($getRecommendationWorker); $i++) {
                        $recommendations =$getRecommendationWorker[$i]['recommendations']; 
                        if (count($getRecommendationWorker[$i]->recommendations) > 0) {
                    ?>
                        <div class="person-box-pos animatable fadeIn">
                            <div class="person-panel">
                                <div class="person-left person-mobile">
                                    <div class="person-photo-autor">
                                        <img src="{{asset('photo_linkedin/'. $getRecommendationWorker[$i]['photo'])}}" class="person-photo-format">
                                        <a class="person-link" href="{{ $getRecommendationWorker[$i]['profile_worker'] }}" target="_blank"><span class="icon"></span></a>
                                    </div>
                                </div>
                                <div class="person-right person-mobile">
                                    <div class="person-name">
                                        <a href="{{ $getRecommendationWorker[$i]['profile_worker'] }}" target="_blank">{{ $getRecommendationWorker[$i]['name'] }}</a>
                                    </div>
                                    <div class="person-work">
                                        {{ $getRecommendationWorker[$i]['description'] }}
                                    </div>
                                    <div class="person-rec">

                                        <div class="slider-position">
                                            <div class="elements-list" id="slider{{ $getRecommendationWorker[$i]['id'] }}" data-slider-id="{{ $getRecommendationWorker[$i]['id'] }}">

                                                <?php for ($j = 0; $j < count($recommendations); $j++) { ?>

                                                <div class="element">
                                                    <div class="element-text">
                                                        {{ $recommendations[$j]['recommendation'] }}
                                                    </div>
                                                    <div class="person-author-position person-author-bottom">
                                                        <a href="{{ $recommendations[$j]['profile_author'] }}" target="_blank" class="person-author-name-href">
                                                            <div class="person-rec-author">{{ $recommendations[$j]['author'] }}</div>
                                                            <div class="person-rec-author-work">{{ $recommendations[$j]['work_author'] }}</div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <?php } ?>
                                                
                                            </div>
                                        </div> 

                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php }}} ?>

                    </div>
                </div>
            </div>




            <div class="background-form">
                <div class="cnt-about-us-1200">
                    <div class="big-title big-title-768 animatable slideInDown">
                        <a class="anchor" name="fot_it_teams">Try our headhunters!</a>
                    </div>
                    <div class="about-us-desc animatable fadeIn">
                        Fill out the form below and we will send you report with suitable candidates within 3 days. Remember, It is better to describe
                        every detail so we will be able to find candidates tailored to your needs.
                    </div>

                    @if (count($errors) > 0)
                    <div class="alert-form">
                        @foreach ($errors->all() as $error)
                        <ul class="list-error">
                            <li>{{ $error }}</li>
                        </ul>
                        @endforeach
                    </div>
                    @endif

                    <div class="form-position">
                        {!! Form::open(['action'=>['FormsController@send'], 'method' => 'post', 'class' => 'form', 'novalidate' => 'novalidate',
                        'files' => true]) !!}

                        <div class="title-form  animatable fadeInDown">General
                        </div>
                        <div class="grid">
                            <div class="inputWithIcon grid-3 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="text" name="name" placeholder="Name" required formHr>
                                    <img src="{{ asset('img/avatar.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>

                            <div class="inputWithIcon grid-3 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="text" name="phone" placeholder="Phone number" required formHr>
                                    <img src="{{ asset('img/phone.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>

                            <div class="inputWithIcon grid-3 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="email" name="email" placeholder="Email" required formHr>
                                    <img src="{{ asset('img/envelope.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>

                            <div class="inputWithIcon grid-2 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="text" name="job_title" placeholder="Job title" required formHr>
                                    <img src="{{ asset('img/enterprise.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>

                            <div class="inputWithIcon grid-2 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="text" name="company_name" placeholder="Company name" required formHr>
                                    <img src="{{ asset('img/enterprise.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>

                            <div class="inputWithIcon grid-3 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="text" name="location" placeholder="Location" required formHr>
                                    <img src="{{ asset('img/location.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>

                            <div class="inputWithIcon grid-3 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="number" name="type_salary" placeholder="Type salary" required formHr>
                                    <img src="{{ asset('img/money.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>

                            <div class="inputWithIcon grid-3 animatable fadeIn">
                                <div class="grid-margin">
                                    <input name="start_date" placeholder="Start date" class="textbox-n" type="text" onfocus="(this.type='date')" id="date" required
                                        formHr>
                                    <img src="{{ asset('img/calendar.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                        </div>

                        <div class="grid-margin">
                            <div class="text-pos-form">
                                <div class="text-form-style">Remote possible?</div>
                                <div class="element-after-text-form">
                                    <input type="radio" name="remote_possible" id="remotePossible" value="0" checked="checked">No
                                    <input type="radio" name="remote_possible" id="remotePossible" value="1">Yes
                                </div>
                            </div>
                        </div>

                        <div id="showRemotePossible" class="show-hidden-input">
                            <div class="inputWithIcon grid-">
                                <div class="grid-margin">
                                    <input type="number" name="percent_work" placeholder="Percent" formHr>
                                    <img src="{{ asset('img/web.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="inputWithIcon grid-3 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="file" name="upload_file" formHr>
                                    <img src="{{ asset('img/file.png') }}" alt="" class="img-input-form">
                                    <span class="text-allowed-file">Allowed file format: jpg, jpeg, png, pdf, doc, docx, xlsx, txt.</span>
                                </div>
                            </div>
                        </div>
                        <div class="title-form  animatable fadeInDown">Requirements
                        </div>
                        <div class="grid">

                            <div class="inputWithIcon grid-2 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="text" name="must_have" placeholder="Must have" required formHr>
                                    <img src="{{ asset('img/must.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                            <div class="inputWithIcon grid-2 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="text" name="nice_have" placeholder="Nice have" required formHr>
                                    <img src="{{ asset('img/nice.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                            <div class="inputWithIcon grid-1 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="text" name="languages" placeholder="Languages required" required formHr>
                                    <img src="{{ asset('img/language.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                        </div>
                        <div class="title-form  animatable fadeInDown">Project Description</div>
                        <div class="grid-margin">
                            <div class="text-pos-form">
                                <div class="text-form-style">Type of Employment</div>
                                <div class="element-after-text-form">
                                    <input type="checkbox" class="checkbox-form" name="type_work" id="checkboxBtn-btb" value="1">
                                    <label for="checkboxBtn-btb">B2B</label>
                                    <input type="checkbox" class="checkbox-form" name="type_work" id="checkboxBtn-coe" value="2">
                                    <label for="checkboxBtn-coe">Contract of employment</label>
                                    <input type="checkbox" class="checkbox-form" name="type_work" id="checkboxBtn-otoe" value="3">
                                    <label for="checkboxBtn-otoe">Other types of employments</label>
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="inputWithIcon grid-1 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="text" name="project_industry" placeholder="Project industry" formHr>
                                    <img src="{{ asset('img/project.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                            <div class="inputWithIcon grid-2 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="number" name="company_size" placeholder="Company size" formHr>
                                    <img src="{{ asset('img/company.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                            <div class="inputWithIcon grid-2 animatable fadeIn">
                                <div class="grid-margin">
                                    <input type="number" name="project_team_size" placeholder="Project team size" formHr>
                                    <img src="{{ asset('img/company.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                        </div>
                        <div class="grid-margin">
                            <div class="text-pos-form">
                                <div class="text-form-style">Workload?</div>
                                <div class="element-after-text-form">
                                    <input type="radio" name="workload" id="workload" value="0" checked="checked">Fulltime
                                    <input type="radio" name="workload" id="workload" value="1">Parttime
                                </div>
                            </div>
                        </div>
                        <div id="showWorkload" class="show-hidden-input">
                            <div class="inputWithIcon grid-1">
                                <div class="grid-margin">
                                    <input type="number" name="percent_workload" placeholder="Percent" formHr>
                                    <img src="{{ asset('img/web.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                        </div>
                        <div class="grid-margin">
                            <div class="text-pos-form">
                                <div class="text-form-style">Holiday?</div>
                                <div class="element-after-text-form">
                                    <input type="radio" name="holiday" id="holiday" value="0" checked="checked">No
                                    <input type="radio" name="holiday" id="holiday" value="1">Yes
                                </div>
                            </div>
                        </div>
                        <div id="showHoliday" class="show-hidden-input">
                            <div class="inputWithIcon grid-1">
                                <div class="grid-margin">
                                    <input type="number" name="day_holiday" placeholder="Days" formHr>
                                    <img src="{{ asset('img/holiday.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                        </div>
                        <div class="grid">
                            <div class="inputWithIcon grid-2 animatable fadeIn">
                                <div class="grid-margin">
                                    <input name="office_hours_from" placeholder="Office hours from" type="text" onfocus="(this.type='time')" id="office_hours_from"
                                        formHr>
                                    <img src="{{ asset('img/clock.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                            <div class="inputWithIcon grid-2 animatable fadeIn">
                                <div class="grid-margin">
                                    <input name="office_hours_to" placeholder="Office hours to" type="text" onfocus="(this.type='time')" id="office_hours_to"
                                        formHr>
                                    <img src="{{ asset('img/clock.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                        </div>
                        <div class="grid-margin">
                            <div class="text-pos-form">
                                <div class="text-form-style">Travel involved?</div>
                                <div class="element-after-text-form">
                                    <input type="radio" name="travel" id="travel" value="0" checked="checked">No
                                    <input type="radio" name="travel" id="travel" value="1">Yes
                                </div>
                            </div>
                        </div>
                        <div id="showTravel" class="show-hidden-input">
                            <div class="inputWithIcon grid-1">
                                <div class="grid-margin">
                                    <input type="number" name="day_travel" placeholder="Days" formHr>
                                    <img src="{{ asset('img/travel.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                        </div>
                        <div class="grid-margin">
                            <div class="text-pos-form">
                                <div class="text-form-style">Relocation package?</div>
                                <div class="element-after-text-form">
                                    <input type="radio" name="relocation" id="relocation" value="0" checked="checked">No
                                    <input type="radio" name="relocation" id="relocation" value="1">Yes
                                </div>
                            </div>
                        </div>
                        <div id="showRelocation" class="show-hidden-input">
                            <div class="inputWithIcon grid-1">
                                <div class="grid-margin">
                                    <input type="number" name="day_relocation" placeholder="Relocation price" formHr>
                                    <img src="{{ asset('img/relocation.png') }}" alt="" class="img-input-form">
                                </div>
                            </div>
                        </div>

                        <div class="grid-margin">
                            <div class="accept-form animatable fadeIn">
                                <input type="checkbox" name="accept" id="checkboxBtn-accept" value="accept" checked="checked" required formHr>
                                <label for="checkboxBtn-accept">By submitting this form I agree to receive commercial information by electronic means from Collective HR Team (Data controller) I can withdraw my consent at any time. The data will be processed
                                    until the consent is withdrawn. I have the right to access data, to rectify, erasure or restrict
                                    the processing, the right to object, to lodge a complaint with a supervisory authority or to transfer
                                    data.
                                </label>
                            </div>

                            <div class="position-submit-btn">
                                {!! Form::submit('Send', ['class' => 'submit-btn']); !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <div id="messageSend" class="error-modal">
                        <div class="error-modal-cnt">
                            <div class="error-image"></div>
                            <h1 id="error-message" class="error-message"></h1>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <footer>
            <div class="footer">
                <div class="cnt-about-us-1200 footer-pos">
                    <div class="footer-element footer-first">
                        <a href="mailto:hello@collectivehr.com">hello@collectivehr.com</a>
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