AOS.init();

$(window).resize(function () {
    var rightSpace = ($(window).width() - $('.header-container').width()) / 2 + 'px';
    // Create space for fixed element of the burger menu icon
    //$('.menu-section').css('right', rightSpace);
    // Create space for play showreel button 
    $('.showreel-section').css('right', rightSpace);
    // Create space for fixed element of the site logo in the open menu
    $('.menu-logo-open').css('left', rightSpace);
    // Create space for fixed element of the navigation list in the open menu
    $('.header-navigation-open').css('left', rightSpace);
    // Create space for fixed element of the images in the open menu on hover of menu item links
    $('.set-images').css('right', rightSpace);
    // Create padding left to be in line with the container width
    if ($('.container').width() >= 1364) {
        var paddingSpace = (($(window).width() * 0.85) - $('.container').width()) / 2 + 'px';
        $('.header-navigation-open').css('padding-left', paddingSpace);
        $('.set-images').css('padding-right', paddingSpace);
    } else {
        $('.header-navigation-open').css('padding-left', '0px');
        $('.set-images').css('padding-right', '0px');
    }
}).resize();

//--------------------------------------
//cursor jquery 
var cursor = {
    delay: 8,
    _x: 0,
    _y: 0,
    endX: (window.innerWidth / 2),
    endY: (window.innerHeight / 2),
    cursorVisible: true,
    cursorEnlarged: false,
    $dot: document.querySelector('.cursor-dot'),
    $outline: document.querySelector('.cursor-dot-outline'),

    init: function () {
        // Set up element sizes
        this.dotSize = this.$dot.offsetWidth;
        this.outlineSize = this.$outline.offsetWidth;

        this.setupEventListeners();
        this.animateDotOutline();
    },

    setupEventListeners: function () {
        var self = this;

        // change colour on hover of clickable elements
        document.querySelectorAll("input[type=checkbox], a, button, .menu-bar, #menu-bg, .play-button ").forEach(function (el) {
            el.addEventListener('mouseover', function () {
                self.cursorEnlarged = true;
                $('.cursor-dot').css('background', '#ffffff');
                self.toggleCursorSize();
            });
            el.addEventListener('mouseout', function () {
                self.cursorEnlarged = false;
                $('.cursor-dot').css('background', '#0278d7');
                self.toggleCursorSize();
            });
        });

        // chnage colour when menu is opened
        document.querySelectorAll("#menu-bg ").forEach(function (el) {
            el.addEventListener('mouseover', function () {
                self.cursorEnlarged = true;
                $('.cursor-dot').css('background', '#ffffff');
            });
            el.addEventListener('mouseout', function () {
                self.cursorEnlarged = false;
                $('.cursor-dot').css('background', '#ffffff');
            });
        });

        // Click events
        document.addEventListener('mousedown', function () {
            self.cursorEnlarged = true;
            self.toggleCursorSize();
        });
        document.addEventListener('mouseup', function () {
            self.cursorEnlarged = false;
            self.toggleCursorSize();
        });

        document.addEventListener('mousemove', function (e) {
            // Show the cursor
            self.cursorVisible = true;
            self.toggleCursorVisibility();

            // Position the dot
            self.endX = e.pageX;
            self.endY = e.pageY;
            self.$dot.style.top = self.endY + 'px';
            self.$dot.style.left = self.endX + 'px';
        });

        // Hide/show cursor
        document.addEventListener('mouseenter', function (e) {
            self.cursorVisible = true;
            self.toggleCursorVisibility();
            self.$dot.style.opacity = 1;
            self.$outline.style.opacity = 1;
        });

        document.addEventListener('mouseleave', function (e) {
            self.cursorVisible = true;
            self.toggleCursorVisibility();
            self.$dot.style.opacity = 0;
            self.$outline.style.opacity = 0;
        });
    },

    // animate the dot outline on call of this function
    animateDotOutline: function () {
        var self = this;

        self._x += (self.endX - self._x) / self.delay;
        self._y += (self.endY - self._y) / self.delay;
        self.$outline.style.top = self._y + 'px';
        self.$outline.style.left = self._x + 'px';

        requestAnimationFrame(this.animateDotOutline.bind(self));
    },

    //change the size of the cursor when this function is called
    toggleCursorSize: function () {
        var self = this;

        if (self.cursorEnlarged) {
            self.$dot.style.transform = 'translate(-50%, -50%) scale(0.75)';
            self.$outline.style.transform = 'translate(-50%, -50%) scale(2)';
        } else {
            self.$dot.style.transform = 'translate(-50%, -50%) scale(1)';
            self.$outline.style.transform = 'translate(-50%, -50%) scale(1)';
        }
    },

    // changes the cursor visibilty on call of this function
    toggleCursorVisibility: function () {
        var self = this;

        if (self.cursorVisible) {
            self.$dot.style.opacity = 1;
            self.$outline.style.opacity = 1;
        } else {
            self.$dot.style.opacity = 0;
            self.$outline.style.opacity = 0;
        }
    }
}

cursor.init();
//--------------------------------------

// when the user clicks on the read more button within the project page
$('.read-more-project .arrow-button').click(function () {
    //check if the button has class show or not, if yes
    if ($(this).hasClass("show")) {
        //remove class show
        $(this).removeClass("show");
        //slide up the content slowly
        $('.description-section.project-paragraph-section').slideUp("slow");
        //change the text to read the story
        $(".read-more-project .button-text").text('Read the story.');
        //remove calss no-space to add space
        $('.read-more-project').removeClass("no-space");
    }
    else {
        //add class show
        $(this).addClass("show");
        //slide down content slowly
        $('.description-section.project-paragraph-section').slideDown("slow");
        //change text to show less
        $(".read-more-project .button-text").text('Show less.');
        //remove extra space
        $('.read-more-project').addClass("no-space");
    }
});

// Enable and open menu
$('.menu-bar').click(function () {
    // Toggle burger icon to change to x
    $(this).toggleClass('open');
    // Toggle menu list navigation showing
    $('#nav').toggleClass('open');
    // Toggle menu background
    $('.menu-bg').toggleClass('change');
    // Stop body scroll when menu open
    $('body').toggleClass('stop-scroll');
});

// On hover of menu link item, the image attached to it shows (roughly desktop only) 
$('.menu-item-link').hover(function () {
    // Get second class in line 
    var secondClass = $(this).attr('class').split(' ')[1];
    // Toggle show image on hover
    $('.' + secondClass + '-image').toggleClass('show');
});

// Open video overlay when play showreel button is pressed
$('.play-button').click(function () {
    // Show showreel open
    $('.full-video-overlay').addClass('show');
    // Stop body scroll when showreel is open
    $('body').addClass('stop-scroll');
});

// Close video overlay when close button is pressed
$('.close-button').click(function () {
    // Close showreel
    $('.full-video-overlay').removeClass('show');
    // Reset body scroll
    $('body').removeClass('stop-scroll');
    // Stop the video if it is playing
    $('#full-showreel').trigger('pause');
});

// Close video overlay when the empty space outside the video is pressed
$('.full-video-overlay').click(function (e) {
    // Close showreel
    $('.full-video-overlay').removeClass('show');
    // Reset body scroll
    $('body').removeClass('stop-scroll');
    // Stop the video if it is playing
    $('#full-showreel').trigger('pause');
    $('#playpausebtn').removeClass('o-play-btn--playing');

});

// Do not close the video overlay when the video itself is pressed
$('.video-player').click(function (e) {
    e.stopPropagation();
});

//if element with services-main exsits
if ($('.services-main').length) {
    //on scroll by the user enter this function
    $(window).scroll(function () {
        //get the croll postion from the top of the screen
        var scrollPos = $(document).scrollTop();
        //loop through every element within the list of the side navigation
        $('.services-container .aside-navigation a').each(function () {
            // setting the curr link to the current element within the foreach
            var currLink = $(this);
            //getting the value of the href
            var refElement = $(currLink.attr("href"));
            //if the refElement positon from the top is smaller than the scroll pos and scroll pos top of of the refElemeent + height of element + 1100 is smaller than scroll poss
            if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() + 1100 > scrollPos) {
                //remove other link from being active  
                $('.services-container .aside-navigation a').removeClass("active");
                //add active to the current link
                currLink.addClass("active");
            }
            else {
                //remove active from the current element
                currLink.removeClass("active");
            }
        });
    });
}

// Slick Slider - About Page - Multiple Image Spacer
$('#image-slider').slick({
    mobileFirst: true,
    centerMode: true,
    centerPadding: '20px',
    slidesToShow: 1,
    arrows: false,
    dots: false,
    autoplay: true,
    autoplaySpeed: 2500,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                centerPadding: '0px',
                slidesToShow: 3,
            }
        }
    ]
});

// Slick Slider - on click of the slider image change cursor to grabbing from default grab value to fake animation of cursor hand
$('#image-slider').on('mousedown', function () {
    $('#image-slider').addClass('grabbing');
}).on('mouseup mouseleave', function () {
    $('#image-slider').removeClass('grabbing');
});

// Slick Slider - About Page - Testimonial images which is directed by the testimonials text
$('.testimonials-image-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.testimonials-content-slider'
});

// Slick Slider - About Page - Testimonial content which directs the images on the side (showing only on desktop > 992px)
$('.testimonials-content-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.testimonials-image-slider',
    focusOnSelect: true,
    prevArrow: $('.prev-button'),
    nextArrow: $('.next-button'),
    autoplay: true,
    autoplaySpeed: 8000,
});

// Slick Slider - News Page - Recent news listings
$('.news-listings-content-slider').slick({
    mobileFirst: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: $('.prev-button'),
    nextArrow: $('.next-button'),
    autoplay: false,
    autoplaySpeed: 8000,
    infinite: false,
    responsive: [
        {
            breakpoint: 568,
            settings: {
                slidesToShow: 1.5,
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2.5,
            }
        }
    ]
});

// Slick slider of the Services page - for each service section
$('.service-image-gallery').slick({
    mobileFirst: true,
    centerMode: true,
    centerPadding: '20px',
    slidesToShow: 1,
    arrows: false,
    dots: false,
    autoplay: false,
    infinite: false,
    autoplaySpeed: 2500,
    responsive: [
        {
            breakpoint: 768,
            settings: "unslick"
        },
    ]
});

// When an input checkbox button is clicked, the label's class is toggled - CONTACT FORM 
$('.wpcf7-checkbox .wpcf7-list-item input').click(function () {
    $(this).next().toggleClass('selected');
});

// When the custom input button in the contact form is clicked, it will click the input by CF7
$('.submit-button').click(function () {
    $('.form-submit-group input').click();
});

// On click on mobile for the content of the single vacancy - a drawer with the lists will open
$('.content-part').click(function () {
    // The text drawer will then be toggled on and off - to show and/or hide
    $('.content-text', this).toggleClass('show');
    // The + symbol on mobile will transition to -
    $('.title-container .mobile-button span', this).toggleClass('minus');
});

// Override the label of Single Vacancies page with the name of the file that would be uploaded - UPLOAD CV ONLY
$('.cv-upload input').change(function () {
    // Replicate the label to build the new one upon
    var i = $('label[for=cv-upload-input]').clone();
    // Added necessary text
    var file = '\'' + $('.cv-upload input')[0].files[0].name + '\' attached';
    // Attached the new text to the upload cv label
    $('label[for=cv-upload-input]').text(file);
});

// Override the label of Single Vacancies page with the name of the file that would be uploaded - UPLOAD COVER LETTER ONLY (same as CV)
$('.cover-letter input').change(function () {
    // Replicate the label to build the new one upon
    var i = $('label[for=cover-letter-input]').clone();
    // Added necessary text
    var file = '\'' + $('.cover-letter input')[0].files[0].name + '\' attached';
    // Attached the new text to the upload cv label
    $('label[for=cover-letter-input]').text(file);
});

// On click of filter toggler on mobile for projects main page
$('.filter-toggle').click(function () {
    // Slide the filters from the left hand side
    $('.filtering-projects').addClass('open');
    // Stop body scroll when menu open
    $('body').addClass('stop-scroll');
    // To hide the burger menu from the page so that it is undeneath the filtering system
    $('.project-filters-section').css('z-index', 'auto');
});

// On click of the clear filters on mobile for projects main page when projects filtering are open
$('.go-back-filters').click(function () {
    // Hide the filters
    $('.filtering-projects').removeClass('open');
    // Reset the scroll of the body
    $('body').removeClass('stop-scroll');
    // Reset the z-index as it was
    $('.project-filters-section').css('z-index', '2');
    // Scroll to the top of the page of filters section
    $('html, body').animate({
        scrollTop: $("#filter").offset().top
    }, 500);
});

// When an input checkbox button is clicked, the label's class is toggled - PROJECTS FILTERS MAIN PAGE
$('.project-taxonomy input').click(function () {
    $(this).next().toggleClass('selected');
});


$('.playpausebtn').click(function () {
    var vid = $(this).parent().prev('video')[0];
    //toggles class to change the look of the play and pause button
    $(this).toggleClass('o-play-btn--playing');
    //if video is paused
    if (vid.paused) {
        // play video
        vid.play();
    } else {
        //else pause video
        vid.pause();
    }
});

//setting the seek to 
$('.seekslider').change(function () {
    var vid = $(this).parent().parent().prev('video')[0];

    var seekto = vid.duration * ($(this).val() / 100);
    vid.currentTime = seekto;
});


$('.mutebtn').click(function () {
    var vid = $(this).parent().prev('video')[0];
     

    if (vid.muted) {
        vid.muted = false;
        $(vid).next().find('.volume').css('display', 'block');
        $(vid).next().find('.mute').css('display', 'none');
        $(vid).next().find('.volumeslider').val() = 100;
    } else {
        vid.muted = true;
        $(vid).next().find('.volume').css('display', 'none');
        $(vid).next().find('.mute').css('display', 'block');
        $(vid).next().find('.volumeslider').val() = 0;
    }
});

$('.volumeslider').change(function () {
    var vid = $(this).parent().prev('video')[0];
    vid.volume = $(this).val() / 100;
});

$('.fullscreenbtn').click(function () {
    var vid = $(this).parent().prev('video')[0];

    if (vid.requestFullScreen) {
        vid.requestFullScreen();
    } else if (vid.webkitRequestFullScreen) {
        vid.webkitRequestFullScreen();
    } else if (vid.mozRequestFullScreen) {
        vid.mozRequestFullScreen();
    }
});

$('.video').bind('timeupdate', function () {
    var vid = $(this)[0];
    var seekslider = $(this).next().find('.seekslider');
    var nt = vid.currentTime * (100 / vid.duration);
    seekslider.val(nt);
    // get the video current time and divide by 60 and round it using math.floor
    var curmins = Math.floor(vid.currentTime / 60);
    // to get current play seconds, get current video time - current minutes and multiply by 60 and then use math.floor to round
    var cursecs = Math.floor(vid.currentTime - curmins * 60);
    // to get duration in minutes, video duration divded by 60
    var durmins = Math.floor(vid.duration / 60);
    //to get durration in seconds, video duration - duration ninutes * 60
    var dursecs = Math.floor(vid.duration - durmins * 60);
    // if current seconds are smaller than 10
    if (cursecs < 10) { cursecs = "0" + cursecs; }
    // if duration seconds are smaller than 10
    if (dursecs < 10) { dursecs = "0" + dursecs; }
    //if current minutes are smaller than 10 
    if (curmins < 10) { curmins = "0" + curmins; }
    //if duration in minutes are smaller than 10 
    if (durmins < 10) { durmins = "0" + durmins; }
    //display minutes and seconds
    $(this).next().find('.curtimetext').text(curmins + ":" + cursecs);
    $(this).next().find('.durtimetext').text(durmins + ":" + dursecs);

    if (vid.currentTime == vid.duration) {
       $(this).next().find('.playpausebtn').toggleClass('o-play-btn--playing');
    }
});


$(window).on('load', function () { 
    //on load this function will set the duration time of every video
    setTimeout(function () { 
        $(function () {
            $('.video').each(function () {

                var vid = $(this)[0];
                // to get duration in minutes, video duration divded by 60
                var durmins = Math.floor(vid.duration / 60);
                //to get durration in seconds, video duration - duration ninutes * 60
                var dursecs = Math.floor(vid.duration - durmins * 60);
                // if duration seconds are smaller than 10
                if (dursecs < 10) { dursecs = "0" + dursecs; }
                //if duration in minutes are smaller than 10 
                if (durmins < 10) { durmins = "0" + durmins; }
                //display minutes and seconds
                // $(this).nextAll('.showreel-nav').find('.durtimetext').text(durmins + ":" + dursecs);
                $(this).nextUntil('showreel-nav').find('.durtimetext').text(durmins + ":" + dursecs);
            });
        });
    }, 1000);

    //call logo change function
    $('body').changeLogo();
});

//on client scroll
$(window).on("scroll", function () {
    //call logo change function
    $('body').changeLogo();
});


$(function () {
    //get scroll value of the window
    $.fn.changeLogo = function () {
        var scrollPos = $(document).scrollTop();
        //if scroll positon is greater than 200
        if (scrollPos > 200) {
            //show small logo
            $('.logo-section .small').removeClass('hide');
            //hide big logo
            $('.logo-section .large').addClass('hide');
        }
        else {
            //show small logo
            $('.logo-section .small').addClass('hide');
            //hide big logo
            $('.logo-section .large').removeClass('hide');
        }
    };
});


//clear project filters
$('.filters-header .clear-filter').click(function () {
    //remove class selected on the label element
    $('.filters-form .project-taxonomy label').removeClass('selected');
    //uncheck checkboxes to false
    $('.filters-form .project-taxonomy input').prop('checked', false);
    //trigger click on apply filter
    $('.filters-form .submit-button button').trigger('click');
});

//hide video on single project page 
//if element with single-project-main exsits
if ($('.single-project-main').length) {
    //on scroll by the user enter this function
    $(window).scroll(function () {
        //get the croll postion from the top of the screen
        var scrollPos = $(document).scrollTop();

        if (scrollPos > 1600) {
            $('.introduction-section').css('opacity', '0');
        }
        else {
            $('.introduction-section').css('opacity', '1');
        }
    });
}