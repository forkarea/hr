document.addEventListener("DOMContentLoaded", function () {

    // menu show/hidden
    function showHiddenMenu() {
        var btn = document.querySelector('.hamburger');
        var menuList = document.querySelector('#menuList');
        var menuHref = document.querySelectorAll('.menu-href');

        for (var i = 0; i < menuHref.length; i++) {
            menuHref[i].addEventListener("click", function () {
                var buttonHamburger = document.querySelector("#buttonHamburger");
                if (buttonHamburger.classList.contains("is-active")) {
                    buttonHamburger.classList.remove("is-active");
                    menuList.classList.add('menu-hidden');
                    menuList.classList.remove('menu-show');
                }
            });
        }
        btn.addEventListener("click", function () {
            btn.classList.toggle('is-active');
            if (menuList.classList.contains('menu-hidden')) {
                menuList.classList.remove('menu-hidden');
                menuList.classList.add('menu-show');
            } else {
                menuList.classList.add('menu-hidden');
                menuList.classList.remove('menu-show');
            }
        });
    }

    //fixed menu scroolY
    function fixedMenuScroll() {
        let firstElement = document.querySelector("#fixedMenuAdd");
        let sticky = firstElement.offsetTop;
        const menu = document.querySelector("#fixedMenu");
        const menuChild = menu.children[0];

        window.onscroll = function () {
            if (window.scrollY > (sticky - 100)) {
                if (!menu.classList.contains('menu-list-fixed')) {
                    menu.classList.add('menu-list-fixed');
                    menuChild.classList.add('menu-ul-li');
                }
            } else {
                if (menu.classList.contains('menu-list-fixed')) {
                    menu.classList.remove('menu-list-fixed');
                    menuChild.classList.remove('menu-ul-li');
                }
            }
        };
    }

    //scrool animated.css
    // Detailed explanation can be found at http://www.bram.us/2013/11/20/scroll-animations/
    // --> Check https://codepen.io/bramus/pen/vKpjNP mirror: https://codepen.io/major697/pen/JBvaGz

    // jQuery(function ($) {

    //     // Function which adds the 'animated' class to any '.animatable' in view
    //     var doAnimations = function () {

    //         // Calc current offset and get all animatables
    //         var offset = $(window).scrollTop() + $(window).height(),
    //             $animatables = $('.animatable');

    //         // Unbind scroll handler if we have no animatables
    //         if ($animatables.length == 0) {
    //             $(window).off('scroll', doAnimations);
    //         }

    //         // Check all animatables and animate them if necessary
    //         $animatables.each(function (i) {
    //             var $animatable = $(this);
    //             if (($animatable.offset().top + $animatable.height() - 40) < offset) {
    //                 $animatable.removeClass('animatable').addClass('animated');
    //             }
    //         });

    //     };

    //     // Hook doAnimations on scroll, and trigger a scroll
    //     $(window).on('scroll', doAnimations);
    //     $(window).trigger('scroll');

    // });

    function scrollAnimatedCss() {
        var eventResize = new Event('resize');
        window.addEventListener("resize", function (e) {
            var animated = document.querySelectorAll('.animatable');

            if (e.target.innerWidth > 768) {

                var event = new Event('scroll');
                window.addEventListener('scroll', function (e) {

                    [].forEach.call(animated, function (animate) {

                        var posElementY = animate.getBoundingClientRect().top + animate.getBoundingClientRect().height;
                        var posHeight = window.innerHeight;
                        // const posPage = window.pageYOffset + window.innerHeight;                

                        if (posElementY - posHeight * 0.8 - 40 <= 0) {
                            animate.classList.remove('animatable');
                            animate.classList.add('animated');
                        }
                    });
                }, false);
                window.dispatchEvent(event);
            } else {
                [].forEach.call(animated, function (animate) {
                    animate.classList.remove('animatable');
                });
            }
        });
        window.dispatchEvent(eventResize);
    }

    //Slider
    class Slider {
        constructor(elemSelector, opts) {

            const defaultOptions = {
                pauseTime: 0,
                nextText: "następny slide",
                prevText: "poprzedni slide",
                generateDots: true,
                generatePrevNext: true
            };

            this.options = Object.assign({}, defaultOptions, opts);

            this.currentSlide = 0;
            this.sliderSelector = elemSelector;
            this.elem = null;
            this.slider = null;
            this.slides = null;
            this.prev = null;
            this.next = null;
            this.dots = [];

            this.generateSlider();
            this.changeSlide(this.currentSlide);
        }

        changeSlide(index) {

            //slide
            [].forEach.call(this.slides, function (slide) {
                slide.classList.remove('element-date-animate');
                slide.classList.remove('slider-slide-active');
                slide.setAttribute('arian-hidden', true);
            });

            this.slides[index].classList.add('element-date-animate');
            this.slides[index].classList.add('slider-slide-active');
            this.slides[index].setAttribute('aria-hidden', false);

            //dots
            if (this.options.generateDots) {

                this.dots.forEach(el => {
                    el.classList.remove('slider-dots-element-active');
                });
                this.dots[index].classList.add('slider-dots-element-active');
            }

            this.currentSlide = index;

            if (typeof this.options.pauseTime === 'number' && this.options.pauseTime !== 0) {

                clearInterval(this.time);
                this.time = setTimeout(function () {
                    this.slideNext();
                }.bind(this), this.options.pauseTime);

            }

        }

        createDots() {
            const ulDots = document.createElement('ul');
            ulDots.classList.add('slider-dots');
            ulDots.setAttribute('arial-label', 'Slider pagination');

            for (let i = 0; i < this.slides.length; i++) {
                const li = document.createElement('li');
                li.classList.add('slider-dots-element');

                const btn = document.createElement('button');
                btn.classList.add('slider-dots-button');
                btn.type = 'button';
                btn.innerText = i + 1;
                btn.setAttribute('arial-label', 'Set slide' + (i + 1));

                btn.addEventListener("click", () => {
                    this.changeSlide(i);
                });

                li.appendChild(btn);
                ulDots.appendChild(li);

                this.dots.push(li);


            }

            this.slider.appendChild(ulDots);
        }

        slidePrev() {
            this.currentSlide--;
            if (this.currentSlide < 0) {
                this.currentSlide = this.slides.length - 1;
            }
            this.changeSlide(this.currentSlide);
        }

        slideNext() {
            this.currentSlide++;
            if (this.currentSlide > this.slides.length - 1) {
                this.currentSlide = 0;
            }
            this.changeSlide(this.currentSlide);
        }

        createPrevNext() {
            this.prev = document.createElement('button');
            this.prev.type = 'button';
            this.prev.innerText = this.options.prevText;
            let classToAdd = ['slider-button', 'slider-button-prev'];
            this.prev.classList.add(...classToAdd);
            this.prev.addEventListener("click", this.slidePrev.bind(this));

            this.next = document.createElement('button');
            this.next.type = 'button';
            this.next.innerText = this.options.nextText;
            let classToAdd2 = ['slider-button', 'slider-button-next'];
            this.next.classList.add(...classToAdd2);
            this.next.addEventListener("click", this.slideNext.bind(this));

            const nav = document.createElement('div');
            nav.classList.add('slider-nav');
            nav.setAttribute('arial-label', 'Slider prev next');
            nav.appendChild(this.prev);
            nav.appendChild(this.next);
            this.slider.appendChild(nav);
        }

        generateSlider() {

            this.slider = document.querySelector(this.sliderSelector);
            this.slider.classList.add('slider');

            const slidesCnt = document.createElement('div');
            slidesCnt.classList.add('slider-slides-cnt');

            this.slides = this.slider.children;

            while (this.slides.length) {
                this.slides[0].classList.add('slider-slide');
                slidesCnt.appendChild(this.slides[0]);
            }

            // this.slides = slidesCnt.children;
            this.slides = slidesCnt.querySelectorAll('.slider-slide');

            this.slider.appendChild(slidesCnt);

            if (this.options.generatePrevNext) this.createPrevNext();
            if (this.options.generateDots) this.createDots();

        }

    }

    function showHiddenInput(id, input) {
        const radioBtn = document.querySelectorAll('#' + id);

        for (let i = 0; i < radioBtn.length; i++) {
            radioBtn[i].addEventListener("click", function () {
                if (radioBtn[i].value == 1) {
                    document.querySelector('#' + input).style.display = 'block';
                } else if (radioBtn[i].value == 0) {
                    document.querySelector('#' + input).style.display = 'none';

                }
            });

        }

    }

    //validate form
    const validateForm = (function () {

        let options = {};

        const showValidInput = function (input, inputInValid, message) {

            if (inputInValid) {

                input.classList.add('show-error-form');

                //scroll to error
                const inputError = document.querySelector(".show-error-form");
                inputError.scrollIntoView({
                    behavior: "smooth",
                    block: "center",
                    inline: "center"
                });

            } else {
                input.classList.remove('show-error-form');

            }

        };
        const showValidCheckbox = function (input, inputInValid, message) {

            if (inputInValid) {
                input.parentNode.classList.add('accept-form-error');
            } else {
                input.parentNode.classList.remove('accept-form-error');
            }

        };

        const validateText = function (input) {

            let inputInValid = false;
            let message = false;

            if (input.hasAttribute('required')) {
                if (input.value === '' || input.value === null) {
                    message = "This file is required.";
                    inputInValid = true;
                }
            } else {
                inputInValid = false;
            }


            if (inputInValid) {
                showValidInput(input, true, message);
                return false;
            } else {
                showValidInput(input, false, message);
                return true;
            }

        };

        const validateEmail = function (input) {
            let inputInValid = false;
            let message = false;

            if (input.hasAttribute('required') && input.value.length === 0) {
                message = "This file is required.";
                inputInValid = true;
            } else if (input.value.length > 0) {
                const mailReg = new RegExp('^[0-9a-zA-Z_.-]+@[0-9a-zA-Z.-]+\.[a-zA-Z]{2,3}$', 'gi');
                if (!mailReg.test(input.value)) {
                    message = "The email address provided is not valid.";
                    inputInValid = true;
                }
            } else {
                inputInValid = false;
            }

            if (inputInValid) {
                showValidInput(input, true, message);
                return false;
            } else {
                showValidInput(input, false, message);
                return true;
            }

        };

        const validateNumber = function (input) {
            let inputInValid = false;
            let message = false;

            if (input.hasAttribute('required') && input.value.length === 0) {
                message = "This file is required.";
                inputInValid = true;
            } else if (input.value.length > 0) {
                const numberReg = new RegExp('^[0-9]*$', 'gi');
                if (!numberReg.test(input.value)) {
                    message = "This field must be a number.";
                    inputInValid = true;
                }
            } else {
                inputInValid = false;
            }

            if (inputInValid) {
                showValidInput(input, true, message);
                return false;
            } else {
                showValidInput(input, false, message);
                return true;
            }

        };

        const validateFile = function (input) {

            let inputInValid = false;
            let message = false;

            if (input.hasAttribute('required') && input.value.length === 0) {
                message = "This file is required.";
                inputInValid = true;
            } else if (input.value.length > 0) {
                if (/\.(jpe?g|png|pdf|doc|docx|xlsx|txt|)$/i.test(input.value) === false) {
                    message = "Allowed file format: jpg,jpeg,png,pdf,doc,docx,xlsx,txt";
                    inputInValid = true;
                }
            } else {
                inputInValid = false;
            }

            if (inputInValid) {
                showValidInput(input, true, message);
                return false;
            } else {
                showValidInput(input, false, message);
                return true;
            }

        };

        const validateCheckbox = function (input) {

            let inputInValid = false;
            let message = false;

            if (input.hasAttribute('required')) {
                if (input.checked === false) {
                    message = "This file is required.";
                    inputInValid = true;
                }
            } else {
                inputInValid = false;
            }


            if (inputInValid) {
                showValidCheckbox(input, true, message);
                return false;
            } else {
                showValidCheckbox(input, false, message);
                return true;
            }

        };

        const prepareElements = function () {

            const elementsRequired = document.querySelectorAll(":scope [formHr]");
            [].forEach.call(elementsRequired, function (el) {
                const type = el.type.toUpperCase();

                if (type === 'TEXT') {
                    el.addEventListener("keyup", function () {
                        validateText(el)
                    });
                    el.addEventListener("blur", function () {
                        validateText(el)
                    });
                }

                if (type === 'EMAIL') {
                    el.addEventListener("keyup", function () {
                        validateEmail(el)
                    });
                    el.addEventListener("blur", function () {
                        validateEmail(el)
                    });
                }

                if (type === 'NUMBER') {
                    el.addEventListener("keyup", function () {
                        validateNumber(el)
                    });
                    el.addEventListener("blur", function () {
                        validateNumber(el)
                    });
                }

                if (type === 'FILE') {
                    el.addEventListener("change", function () {
                        validateFile(el)
                    });
                }

                if (type === 'CHECKBOX') {
                    el.addEventListener("change", function () {
                        validateCheckbox(el)
                    });
                }

            });

        };

        function ajaxSend(data) {
            action = 'contact';

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        document.querySelector('#messageSend').classList.add('error-modal-show');
                        document.querySelector('#error-message').innerText = 'Message send, OK!';
                        document.querySelector('.form').reset();

                        document.addEventListener('click', function (event) {
                            if (!event.target.closest(".error-modal-cnt")) {
                                document.querySelector('#messageSend').classList.remove('error-modal-show');
                            }
                        });
                        setTimeout(function () {
                            document.querySelector('#messageSend').classList.remove('error-modal-show');
                        }, 2000);

                    } else {
                        document.querySelector('#messageSend').classList.add("error-modal-show");
                        document.querySelector('.error-modal-cnt').classList.add("error-error-modal-cnt");
                        document.querySelector('.error-image').classList.add("error-error-image");
                        document.querySelector('#error-message').innerText = "An error occurred and the email was not sent.";

                        document.addEventListener("click", function (event) {
                            if (!event.target.closest(".error-modal-cnt")) {
                                document.querySelector('#messageSend').classList.remove('error-modal-show');
                            }
                        });
                        setTimeout(function () {
                            document.querySelector('#messageSend').classList.remove('error-modal-show');
                        }, 2000);

                    }
                }
            }
            xmlhttp.open("POST", action, true);
            xmlhttp.send(data);
        }

        const sendMail = function () {

            options.form.addEventListener('submit', function (e) {
                e.preventDefault();
                let validate = true;
                const elementsRequired = document.querySelectorAll(":scope [formHr]");

                [].forEach.call(elementsRequired, function (element) {
                    const type = element.type.toUpperCase();

                    if (type === 'TEXT') {
                        if (!validateText(element)) {
                            validate = false;
                        }
                    }

                    if (type === 'EMAIL') {
                        if (!validateEmail(element)) {
                            validate = false;
                        }
                    }

                    if (type === 'NUMBER') {
                        if (!validateNumber(element)) {
                            validate = false;
                        }
                    }

                    if (type === 'FILE') {
                        if (!validateFile(element)) {
                            validate = false;
                        }
                    }

                    if (type === 'CHECKBOX') {
                        if (!validateCheckbox(element)) {
                            validate = false;
                        }
                    }

                });
                if (validate) {

                    var formData = new FormData(this);
                    ajaxSend(formData);



                    // $.ajax({
                    //     type: 'POST',
                    //     url: 'contact',
                    //     data: formData,
                    //     cache: false,
                    //     contentType: false,
                    //     processData: false,
                    //     success: function () {
                    //         $("#messageSend").addClass("error-modal-show");
                    //         $("#error-message").text("Message send, OK!");
                    //         $('.form')[0].reset();

                    //         $(document).click(function (event) {
                    //             if (!$(event.target).closest(".error-modal-cnt").length) {
                    //                 $("body").find("#messageSend").removeClass("error-modal-show");
                    //             }
                    //         });
                    //     },
                    //     error: function () {
                    //         $("#messageSend").addClass("error-modal-show");
                    //         $("#messageSend").children().addClass("error-error-modal-cnt");
                    //         $(".error-image").addClass("error-error-image");
                    //         $("#error-message").text("An error occurred and the email was not sent.");
                    //         $(document).click(function (event) {
                    //             if (!$(event.target).closest(".error-modal-cnt").length) {
                    //                 $("body").find("#messageSend").removeClass("error-modal-show");
                    //             }
                    //         });
                    //     }
                    // });
                    // this.submit();
                } else {
                    return false;
                }

            });

        };

        const init = function (defaultOptions) {
            options = {
                form: defaultOptions.form || null,
                classError: defaultOptions.classError || 'error'
            };

            if (options.form === null || options.form === undefined || options.form.length === 0) {
                console.warn("blad formularza");
                return false;
            }

            // options.form.setAttribute('novalidate', 'novalidate');
            prepareElements();
            sendMail();
        };



        return {
            init: init
        };

    }());
    class Cookie {

        constructor(name, value, days, path, domain, secure, btn) {
            this.name = name;
            this.value = value;
            this.days = days;
            this.path = path;
            this.domain = domain;
            this.secure = secure;
            this.btn = btn;

            this.checkCookieIsset();
        }

        setCookieInfo() {
            if (navigator.cookieEnabled) {
                const cookieName = encodeURIComponent(this.name);
                const cookieValue = encodeURIComponent(this.value);
                let allName = cookieName + '=' + cookieValue;

                if (typeof this.days === "number") {
                    const data = new Date();
                    data.setTime(data.getTime() + (this.days * 24 * 60 * 60 * 1000));
                    allName += '; expires=' + data.toGMTString();
                }

                if (this.path) {
                    allName += '; path=' + this.path;
                }

                if (this.domain) {
                    allName += '; domain=' + this.domain;
                }

                if (this.secure) {
                    allName += '; secure';
                }

                let save = document.cookie = allName;

                if (save) {
                    let cookieAll = document.querySelector("#cookieAll");
                    let cookieCild = cookieAll.children[0];
                    cookieCild.classList.add("cookie-hidden");
                    // while (cookieAll.firstChild) cookieAll.removeChild(cookieAll.firstChild);
                }
            } else {
                console.warn("Cookie disabled!");
            }
        }

        btnCookie() {
            this.btn.addEventListener("click", function () {
                this.setCookieInfo();
            }.bind(this));
        }

        checkCookieIsset() {
            const dc = document.cookie;
            if (dc !== "") {
                let cookies = dc.split(/; */);
                for (let i = 0; i < cookies.length; i++) {
                    let cookieName = cookies[i].split("=")[0];
                    let cookieValue = cookies[i].split("=")[1];
                    if (cookieName !== decodeURIComponent(this.name)) {
                        this.btnCookie();
                    } else {
                        const cookieAll = document.querySelector("#cookieAll");
                        while (cookieAll.firstChild) cookieAll.removeChild(cookieAll.firstChild);
                    }
                }
            }
        }
    }


    showHiddenMenu();
    fixedMenuScroll();
    showHiddenInput('remotePossible', 'showRemotePossible');
    showHiddenInput('workload', 'showWorkload');
    showHiddenInput('holiday', 'showHoliday');
    showHiddenInput('travel', 'showTravel');
    showHiddenInput('relocation', 'showRelocation');
    scrollAnimatedCss();

    const btnCookie = document.querySelector("#btnCookie");
    const cookie = new Cookie("cookie_hr_info", "saveCookieInfo", 90, "/", false, false, btnCookie);

    const optAll = {
        pauseTime: 10000,
        prevText: "Poprzedni",
        nextText: "Następny",
        generateDots: true,
        generatePrevNext: true
    };
    const article = document.querySelectorAll('[data-slider-id]');
    [].forEach.call(article, function (el) {
        let sliderId = el.dataset.sliderId;
        const slider = new Slider('#slider' + sliderId, optAll);
    });


    const getForm = document.querySelector(".form");
    validateForm.init({
        form: getForm
    });

});