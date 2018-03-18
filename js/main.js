// Global parameters
window.params = {
    isMobile: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
    isIOS: /iPhone|iPad|iPod/i.test(navigator.userAgent)
};


/**
     *
     * Check if element exist on page
     *
     * @param el {string} jQuery object (#popup)
     *
     * @return {bool}
     *
*/
function exist(el){
    if ( jQuery(el).length > 0 ) {
        return true;
    } else {
        return false;
    }
}


jQuery(document).ready(function($) {
    
    /*---------------------------
                                  ANIMATION ON SCROLL
    ---------------------------*/
    wow = new WOW({
      boxClass:     'wow',      // default
      animateClass: 'animated', // default
      offset:       200,          // default
      mobile:       false,       // default
      live:         true        // default
    });
    wow.init();

    $(".header").headroom();

    $(window).on('resize load', function(event) {
        event.preventDefault();
        $('body').css( 'padding-top', $('.header').outerHeight() );
        $('.footer-dark, .footer').css('padding-bottom', $('.sticky-footer').outerHeight());
    });


    /*---------------------------
                                  File input logic
    ---------------------------*/
    $('input[type=file]').each(function(index, el) {
        $(this).on('change', function(event) {
            event.preventDefault();
            var placeholder = $(this).siblings('.placeholder');
        
            if ( this.files.length > 0 ) {
                if ( this.files[0].size < 5000000 ) {
                    var filename = $(this).val().split('/').pop().split('\\').pop();
                    if ( filename == '' ) {
                        filename = placeholder.attr('data-label');
                    }
                    placeholder.text(filename);
                } else {
                    alert('Maximum file size is 5Mb');
                }    
            } else {
                placeholder.text( placeholder.attr('data-label') );
            }
            
        });
    });
    
    /*---------------------------
                                PAGE ANCHORS
    ---------------------------*/
    $('.page-menu a, .anchor').click(function() {
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - 50
        }, 800);
        return false;
    });

    /*---------------------------
                                  MENU TOGGLE
    ---------------------------*/
    $('.js-toggle-menu').on('click', function(event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        $(this).toggleClass('is-active');
        $('.mobile-menu').slideToggle();
    });


    /*---------------------------
                                  Mobile-menu
    ---------------------------*/
    $('.mobile-menu .menu-item-has-children > a').on('click', function(event) {
        event.preventDefault();
        $(this).siblings('.sub-menu').slideToggle();
    });


    /*---------------------------
                                  Search
    ---------------------------*/
    $('.js-open-search').on('click', function(event) {
        event.preventDefault();
        $('body').addClass('search-active');
    });

    $('.js-close-search').on('click', function(event) {
        event.preventDefault();
        $('body').removeClass('search-active');
    });

    $('.js-search-input').on('keyup', function(event) {
        event.preventDefault();
        var val = $(this).val();

        if ( val ) {
            $(this).siblings('.js-reset-search-form').css('display', 'block');
            ajax_search(val);
        } else {
            $(this).siblings('.js-reset-search-form').css('display', 'none');
            $('.search-results').html('');
            $('.search-results').append('<div class="search-empty">' + 
                                                    '<img src="'+theme.url+'/images/illo--search-empty.svg" alt="">'+
                                                    '<p>S' + theme.search_tip + '</p>'+
                                                '</div>');
        }
    });

    $('.js-reset-search-form').on('click', function(event) {
        event.preventDefault();
        $(this).css('display', 'none');
        $(this).siblings('.js-search-input').val('').trigger('change');
        $('.search-results').html('');
        $('.search-results').append('<div class="search-empty">' + 
                                        '<img src="'+theme.url+'/images/illo--search-empty.svg" alt="">'+
                                        '<p>' + theme.search_tip + '</p>'+
                                    '</div>');
    });


    function ajax_search(value) {
        var data = {
            action: 'get_search_results',
            value: value
        }
        $.ajax({
            url: theme.ajax_url,
            type: 'POST',
            data: data,
            success: function(result) {
                console.log(result);
                if ( result.status == 'ok' ) {
                    $('.search-results').html('');
                    $.each(result.posts, function(index, val) {
                        $('.search-results').append('<div class="sr-item">' + 
                                                        '<a href="'+val.post_link+'" class="sr-image">' +
                                                            '<img src="'+val.post_thumbnail+'" alt="">' +
                                                        '</a>' +
                                                        '<div class="sr-content">' +
                                                            '<a href="'+val.post_link+'">' +
                                                                '<h2>'+val.post_title+'</h2>' +
                                                            '</a>' +
                                                            '<div class="excerpt">' +
                                                                '<p>'+val.post_excerpt+'</p>' +
                                                            '</div>' +
                                                        '</div>' +
                                                    '</div>');
                    });
                    if ( result.search_link ) {
                        $('.search-results').append('<div class="text-center">' + 
                                                        '<a href="'+result.search_link+'" class="btn btn-default">View all results</a>' +
                                                    '</div>');
                    }
                } else if ( result.status == 'empty' ) {
                    $('.search-results').html('');
                    $('.search-results').append('<div class="search-empty">' + 
                                                    '<img src="'+theme.url+'/images/illo--search-empty.svg" alt="">'+
                                                    '<h4>No results found</h4>'+
                                                    '<p>Try a new search term in the field above</p>'+
                                                '</div>');
                }
            },
            error: function(result) {
                console.log(result);
            }
        });
    }




    /*---------------------------
                                  Fixing social share buttons
    ---------------------------*/
    function em(input) {
        var emSize = parseFloat($("body").css("font-size"));
        return (emSize * input);
    }
    $('#c-share-page').stick_in_parent({
        parent: '#post-content',
        offset_top: em(4)
    });


    /*---------------------------
                                  Fancybox
    ---------------------------*/
    $('.fancybox').fancybox({
        
    });


    /**
     *
     * Open popup
     *
     * @param popup {String} jQuery object (#popup)
     *
     * @return n/a
     *
    */
    function openPopup(popup){
        $.fancybox.open([
            {
                src  : popup,
                type: 'inline',
                opts : {}
            }
        ], {
            loop : false
        });
    }




    /*---------------------------
                                  Subscribe popup
    ---------------------------*/
    function display_subscribe_popup(){
        $('#modal-popup-subscribe').addClass('visible');
    }
    //setTimeout(display_subscribe_popup, 2000);

    $('.js-dismise-subscribe').on('click', function(event) {
        event.preventDefault();
        $('#modal-popup-subscribe').removeClass('visible');
    });



    /*---------------------------
                                  Form submit
    ---------------------------*/
    $('.ajax-form').on('submit', function(event) {
        event.preventDefault();
        var data = new FormData(this);
        $(this).find('button').prop('disabled', true);
        $.ajax({
            url: theme.url + '/forms.php',
            type: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(result) {
                if (result.status == 'ok') {
                    openPopup('#modal-popup-ok')
                } else {
                    openPopup('#modal-popup-error')
                }
            },
            error: function(result) {
                openPopup('#modal-popup-error');
            }
        }).always(function() {
            $('form').each(function(index, el) {
                $(this)[0].reset();
                $(this).find('button').prop('disabled', false);
            });
        });
    });


    



    /*---------------------------
                                  Google map init
    ---------------------------*/
    var map;
    function googleMap_initialize() {
        var lat = $('#map_canvas').data('lat');
        var long = $('#map_canvas').data('lng');

        var mapCenterCoord = new google.maps.LatLng(lat, long);
        var mapMarkerCoord = new google.maps.LatLng(lat, long);

        var styles = [];

        var mapOptions = {
            center: mapCenterCoord,
            zoom: 16,
            //draggable: false,
            disableDefaultUI: true,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

        var styledMapType=new google.maps.StyledMapType(styles,{name:'Styled'});
        map.mapTypes.set('Styled',styledMapType);
        map.setMapTypeId('Styled');

        var markerImage = new google.maps.MarkerImage('images/location.png');
        var marker = new google.maps.Marker({
            icon: markerImage,
            position: mapMarkerCoord, 
            map: map,
            title:"Site Title"
        });
        
        $(window).resize(function (){
            map.setCenter(mapCenterCoord);
        });
    }

    if ( exist( '#map_canvas' ) ) {
        googleMap_initialize();
    }

}); // end file