jQuery(document).ready(function()
{


    /**
     * Header dynamic positioning
     */

    var header = (function()
    {

        if ( !jQuery('body').hasClass('page-template-default') )
        {

            var dom            =  {};
                dom.header     =  jQuery('ul.nav.main_menu_nav');
                dom.modal      =  jQuery('div.modal-content');
                jQuery('body').hasClass('search') ? dom.content = jQuery('div.left_post_navasd h1') : dom.content = jQuery('div.post-wrapper h1');

                dom.search     =  jQuery('div.search-in');
                dom.ads        =  jQuery('div#related_updates');

                dom.modal      =  jQuery('div.fancybox-wrap');

            var offset         =  {};
                offset.header  =  dom.content.offset().left;
                offset.search  =  dom.ads.offset().left;


            // Header dynamic positioning
            dom.header.css('left', offset.header).removeClass('hidden');
            dom.modal.css('left', offset.header).removeClass('hidden');

            // Search dynamic positioning
            dom.search.css('left', jQuery('div#cx').offset().left + jQuery('div#cx').width() + 25).removeClass('hidden');

            jQuery(window).on('resize', function()
            {

                offset.header  =  dom.content.offset().left;
                offset.search  =  dom.ads.offset().left;

                dom.header.css('left', offset.header);
                dom.modal.css('left', offset.header).removeClass('hidden');
                dom.search.css('left', jQuery('div#cx').offset().left + jQuery('div#cx').width() + 25);
            });

            jQuery('#post_main_content img').on('click', function(e)
            {

                e.preventDefault();

                var modalListener = setInterval(function()
                {

                    var modal = jQuery('div.fancybox-wrap');

                    if ( modal.size() > 0 )
                    {

                        clearInterval(modalListener);

                    }
                }, 500);
            });

        }
    })();


    /**
     * Continuous scrolling functionality
     * http://infiniteajaxscroll.com/
     * https://github.com/outdooricon/infinite-scroll-with-history
     */

    var infSingle = (function()
    {

        var device        =  {};
            device.isIOS  =  navigator.userAgent.match(/(iPad|iPhone|iPod)/g);

        if ( !device.isIOS && jQuery(window).width() >= 480 )
        {

            var ias = $.ias(
            {
                container   :  '#cx',
                item        :  '.post',
                pagination  :  '.navx-links',
                next        :  '.navx-links a[rel="prev"]'
            });

            ias.extension(new IASTriggerExtension({
                offset: 100
            }));
            ias.extension(new IASSpinnerExtension());
            ias.extension(new IASPagingExtension());
            ias.extension(new IASHistoryExtension({ prev: '.prev a' }));
        }

    })();


    /**
     * Infinite scroll for the sidebar - helpers
     */

    (function()
    {

        var dateHeadings = jQuery('div.test_inner_news li.dateHeading');

        for ( var i = 0; i < dateHeadings.length; i++ )
        {

            var dateHeading  =  jQuery(dateHeadings[i])
              , date         =  dateHeading.text().replace(/\s+/g, '');

            dateHeading.data('date', date);
        }
    })();



    /**
     * Infinite scroll for the sidebar
     * http://www.paulirish.com/2008/release-infinite-scroll-com-jquery-and-wordpress-plugins/
     */

            var iasj = jQuery.ias(
            {
                container   :  '#sidebar_nav_inner',
                item        :  '.media-list li',
                pagination  :  '.pager',
                next        :  '.pager .next_link'
            });

            iasj.extension(new IASTriggerExtension({
                offset: 100
            }));
            iasj.extension(new IASSpinnerExtension());
            iasj.extension(new IASPagingExtension());
            //iasj.extension(new IASHistoryExtension({ prev: '.prev a' }));


    jQuery('div#sidebar_nav_inner').bind('scroll', function()
    {

        var pager        =  jQuery('ul.pager')
          , nextPage     =  pager.last().find('li.next a').attr('href')
          , isNotSearch  =  !jQuery('body').hasClass('search');

        if ( isNotSearch )
        {

            pager.fadeOut();

            if( $(this).scrollTop() + $(this).innerHeight() >= this.scrollHeight )
            {

//                $('<div/>').load(nextPage + ' div.test_inner_news', function()
//                {


                    $(this).appendTo('div#sidebar_nav_inner').addClass('appended');

                    // Update niceScroll
                    jQuery('.sidebar_nav_inner_news').getNiceScroll().resize();

                    // Re-init sidebar
//                    delete sidebar;

//                    var sidebar = new Sidebar();
//                        sidebar.initialize();
//                        sidebar.home();
//                });

            }

        }

    });



    /**
     * Nice scroll
     * https://github.com/inuyaksa/jquery.nicescroll
     */

    var nyScroll = (function()
    {

        var win               =  {};
            win.width         =  jQuery(window).width();

        var device            =  {};
            device.isDesktop  =  win.width >= 480;


        if ( device.isDesktop )
        {

            // Sidebar
            jQuery('.sidebar_nav_inner_news').niceScroll(
            {

                cursorcolor: '#333',
                autohidemode: false,
                cursorwidth: 10,
                horizrailenabled:false,
                railpadding: {top:0,right:0,left:0,bottom:65}
            });


            // Body
            jQuery('html').niceScroll({
                cursorcolor: "#333",
                autohidemode: false,
                cursorwidth: 10,
                railpadding: {top:0,right:0,left:0,bottom:65}
                // railoffset: { top: 100 }
            });
        }
    })();



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

    // Sidebar
    var sidebar = new Sidebar();
        sidebar.initialize();
        sidebar.home();

    // Advanced search
    var search = new AdvancedSearch();

    // Navigation
    (function()
    {

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


});



