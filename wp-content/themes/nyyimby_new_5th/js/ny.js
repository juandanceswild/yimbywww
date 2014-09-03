    /**
     * MailChimp AJAX newsletter signup
     * https://github.com/scdoshi/jquery-ajaxchimp
     */

    setTimeout(function()
    {

        // console.log( 'Loaded form handlers.' );

        $('form#mailchimp').submit(function() {
            var action = $(this).attr('action');

            $.ajax({
                url: action,
                type: 'POST',
                data: {
                    email: $('#address').val()
                },
                success: function(data){
                    $('div.newsletter-overlay').fadeIn();
                    $('div.newsletter-modal').fadeIn().animate({ 'height' : 70 });
                    $('div.newsletter-container').css('padding-right', 35).html('<p>' + data + '</p>' + '<a href="#" class="close">Close</a>');

                    $('a.close').on('click', function() {
                        $('div.newsletter-overlay').fadeOut();
                        $('div.newsletter-modal').fadeOut();
                    });
                },
                error: function() {
                    $('#result').html('Sorry, an error occurred.').css({
                        'color' : 'red',
                        'display' : 'block',
                        'padding' : '4px 0 0 0'
                    });
                }
            });

            return false;
        });

        $('form#mailchimp2').submit(function() {
            var action = $(this).attr('action');

            $.ajax({
                url: action,
                type: 'POST',
                data: {
                    email: $('#address2').val()
                },
                success: function(data){
                    $('div.newsletter-modal').animate({
                        'height' : 330
                    }, 300);

                    $('#result2').html(data).css({
                        'color' : 'green',
                        'display' : 'block',
                        'padding' : '4px 0 0 0'
                    });
                },
                error: function() {
                    $('div.newsletter-modal').animate({
                        'height' : 320
                    }, 300);

                    $('#result2').html('Sorry, an error occurred.').css({
                        'color' : 'red',
                        'display' : 'block',
                        'padding' : '4px 0 0 0'
                    });
                }
            });

            return false;
        });

    }, 2000);


    // Fixed social icons
    var social = new FixedSocial();

    /*/ Sidebar
    var sidebar = new Sidebar();
        sidebar.initialize();
        sidebar.home();*/

    // Advanced search
    var search = new AdvancedSearch();

    // Navigation
    (function()
    {

/*
        var nav    = jQuery('div.nav-collapse')
          , body   = jQuery('body')
          , button = jQuery('button.btn-navbar');

        var trigger = function(ev)
        {

            ev.preventDefault();

            function show()
            {

                nav.animate({'height' : jQuery(window).height() + 3}, 1000).fadeIn();
            }

            function hide()
            {

                nav.animate({'height' : 0}, 1000).fadeOut();
            }

            nav.height() < 120  ?  show()  :  hide();
        };

        button.on('click', { ev : 'ev' }, trigger);
    })();
*/

 
/*    $('#cx').infinitescroll({
        //selector for the paged navigation (it will be hidden)
        navSelector  : "",
        // selector for the NEXT link (to page 2)
        nextSelector : ".navx-links a[rel=prev]",
        itemSelector : ".post"
    });*/

});


