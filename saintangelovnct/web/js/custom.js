$(window).load(function () {

    "use strict";
    //------------------------------------------------------------------------
    //						PRELOADER SCRIPT
    //------------------------------------------------------------------------
    $('#preloader').delay(400).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('#preloader .loading-data').fadeOut(); // will first fade out the loading animation




    //------------------------------------------------------------------------
    //						NAVBAR SLIDE SCRIPT
    //------------------------------------------------------------------------ 		
    $(window).scroll(function () {
        if ($(window).scrollTop() > $("nav").height()) {
            $("nav.navbar-slide").addClass("show-menu");
        } else {
            $("nav.navbar-slide").removeClass("show-menu");
            $(".navbar-slide .navMenuCollapse").collapse({
                toggle: false
            });
            $(".navbar-slide .navMenuCollapse").collapse("hide");
            $(".navbar-slide .navbar-toggle").addClass("collapsed");
        }
    });


    //------------------------------------------------------------------------
    //						NAVBAR HIDE ON CLICK (COLLAPSED) SCRIPT
    //------------------------------------------------------------------------ 		
    $('.nav a').on('click', function () {
        if ($('.navbar-toggle').css('display') != 'none') {
            $(".navbar-toggle").click()
        }
    });

})




$(document).ready(function () {

    "use strict";



    //------------------------------------------------------------------------
    //						ANCHOR SMOOTHSCROLL SETTINGS
    //------------------------------------------------------------------------
    $('a.goto, .navbar .nav a').smoothScroll({
        speed: 1200
    });




    //------------------------------------------------------------------------
    //						FULL HEIGHT SECTION SCRIPT
    //------------------------------------------------------------------------
    $(".screen-height").css("min-height", $(window).height());
    $(window).resize(function () {
        $(".screen-height").css("min-height", $(window).height());
    });






    //------------------------------------------------------------------------
    //						VIDEO BACKGROUND SETTINGS
    //------------------------------------------------------------------------
    if ($('.audio-box')[0]) {

        audiojs.events.ready(function () {

            var audioArr = $('audio');

            // add data-attributes to all audio tags & playlist
            for (var i = 0; i < audioArr.length; i++) {
                $(audioArr).eq(i).attr('data-index', i);
                var checkPlaylist = $(audioArr).eq(i).closest('.audio-box').find('.playlist');
                if (checkPlaylist) {
                    $(checkPlaylist).attr('data-playlist', i);
                }
            };

            // init audiojs plugin
            var audio = audiojs.createAll({
                trackEnded: function () {
                    var next = $('ol.playlist li.playing').next();
                    if (!next.length) next = $('ol.playlist li').first();
                    next.addClass('playing').siblings().removeClass('playing');
                    var cur = $('ol.playlist li.playing').closest('.audio-box').find('audio').attr('data-index');
                    audio[cur].load($('a', next).attr('data-src'));
                    audio[cur].play();
                }
            });

            function stopPlayers() {
                for (var i = 0; i < audioArr.length; i++) {
                    $('.playlist li').removeClass('playing');
                    audio[i].pause();
                };
            }

            // check default song
            $('.audiojs .play').click(function () {
                var defSong = $(this).closest('.audiojs').find('audio').attr('src');
                var allSong = $(this).closest('.audio-box').find('.playlist li');
                var singlePlayer = $(this).closest('.audiojs').hasClass('singlePlayer');

                for (var i = 0; i < allSong.length; i++) {
                    var checkDef = $(allSong).eq(i).find('a');
                    if (defSong == checkDef.attr('data-src')) {
                        stopPlayers();
                        $(checkDef).closest('li').addClass('playing').siblings('li').removeClass('playing');
                    } else {
                        continue;
                    }
                };

                if (singlePlayer) {
                    stopPlayers()
                }
            });

            // change song
            $('.playlist li a').click(function (event) {
                var curSong = $(this).attr('data-src');
                var curAudioTag = $(this).closest('.playlist').siblings('.audiojs').find('audio').attr('data-index');
                var curPlayList = $(this).closest('.playlist').attr('data-playlist');
                var checkPlaying = $(this).closest('li').hasClass('playing');

                // Play current song
                if (curAudioTag == curPlayList) {
                    if (!checkPlaying) {
                        stopPlayers();

                        audio[curAudioTag].load(curSong);
                        audio[curAudioTag].play();
                    } else {
                        audio[curAudioTag].pause();
                    }
                }

                $(this).closest('li').addClass('playing').siblings('li').removeClass('playing');

                event.preventDefault();
            });
        })

    }



    //------------------------------------------------------------------------
    //						VIDEO BACKGROUND SETTINGS
    //------------------------------------------------------------------------
    if ($('.video-bg')[0]) {
        $(function () {
            var BV = new $.BigVideo({
                container: $('.video-bg'),
                useFlashForFirefox: false
            });
            BV.init();
            if (navigator.userAgent.match(/iPhone|iPad|iPod|Android|BlackBerry|IEMobile/i)) {
                BV.show('images/video_gag.jpg');
            } else {
                if (!!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0) {
                    BV.show('video/video_bg.ogv', {
                        doLoop: true,
                        ambient: true
                    });
                } else {
                    BV.show('video/video_bg.mp4', {
                        doLoop: true,
                        ambient: true,
                        altSource: 'video/video_bg.ogv'
                    });
                }
                BV.getPlayer().on('loadedmetadata', function () {
                    $('#big-video-wrap video').fadeIn('slow');
                });
            }
        });
    }





});


//------------------------------------------------------------------------
//						NORMALIZE CAROUSEL HEIGHTS FUNCTION
//------------------------------------------------------------------------
$.fn.carouselHeights = function () {

    var items = $(this), //grab all slides
        heights = [], //create empty array to store height values
        tallest; //create variable to make note of the tallest slide

    var normalizeHeights = function () {

        items.each(function () { //add heights to array
            heights.push($(this).height());
        });
        tallest = Math.max.apply(null, heights); //cache largest value
        items.each(function () {
            $(this).css('min-height', tallest + 'px');
        });
    };

    normalizeHeights();

    $(window).on('resize orientationchange', function () {
        //reset vars
        tallest = 0;
        heights.length = 0;

        items.each(function () {
            $(this).css('min-height', '0'); //reset min-height
        });
        normalizeHeights(); //run it again 
    });

};