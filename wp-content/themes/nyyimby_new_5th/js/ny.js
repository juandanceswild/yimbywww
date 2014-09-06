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

    // Advanced search
    var search = new AdvancedSearch();

    // Navigation
    $(document).on('ready', function() {

        $('.my-col').niceScroll({cursorcolor:"#333"});

        $('#cx').jscroll({
            padding: 20,
            nextSelector : ".navx-links a[rel=prev]",
            contentSelector: "div.post",
            autoTrigger: false,
            callback: page_loaded,
            debug: true
        });

        $('#sidebar_nav_inner').jscroll({
            //nextSelector : ".navx-links a[rel=prev]",
            padding: 20,
            nextSelector: ".next_link",
            contentSelector: "div.test_inner_news",
            autoTrigger: false,
            callback: menu_page_loaded,
            debug: true
        });

        $('#main_tab').scroll(function() {
            get_next_posts(100);
        });
        get_next_posts(1000);

        $('.my-col.cx').scroll(function() {
            get_next_post(100);
        });
        get_next_post(0);

   });

   // global scope:
   var bottom_load_pixel_height = 500;
   var maintab = $('#main_tab');
   var posttab = $('.my-col.cx');
   var pt_to = undefined;
   var mt_to = undefined;

   function page_loaded() { pt_to=undefined; }
   function menu_page_loaded() { mt_to=undefined; }

   function get_next_post(to) {
        check_frame_height();
        var bottom_load_pixel_height = 100;
        var inrange = 0, protect_lg = 0;

        // TODO: this is case and pasted from get_next_posts...encapsulate this into something reusable
        // is the page still not able to have jscroll attached to it??
        if ($(posttab)[0].scrollHeight == undefined) inrange = 1;

        // is the page scrolled almost all the way down?
        if ($(posttab).scrollTop() + $(posttab).innerHeight() + bottom_load_pixel_height > $(posttab)[0].scrollHeight) inrange = 1;
        //console.log('postab: '+$(posttab).scrollTop() + ' + '+$(posttab).innerHeight() + ' + ' + bottom_load_pixel_height + ' >= ' + $(posttab)[0].scrollHeight);
        //console.log('postab: '+($(posttab).scrollTop() + $(posttab).innerHeight() + bottom_load_pixel_height) + ' >= ' + $(posttab)[0].scrollHeight);

        // is the page not tall enough to trigger a scroll?
        if ($('div.post').innerHeight() < posttab.innerHeight()) {
            protect_lg = 1;
            inrange = 1;
        }
        //console.log('inragne: '+inrange);

        if (pt_to == undefined && inrange) {
            if (protect_lg) setTimeout('get_next_post(42)', 42);
            pt_to = setTimeout('$(".navx-links a[rel=prev]").trigger("click");', to);
        } else if (inrange) {
          if (to==42) setTimeout('get_next_post(42)', 42);
        }

   }

   function get_next_posts(to) {
        check_frame_height();
        var bottom_load_pixel_height = 100;
        var inrange = 0, protect_lg = 0;

        // is the page still not able to have jscroll attached to it??
        if ($(maintab)[0].scrollHeight == undefined) inrange = 1;

        // is the page scrolled almost all the way down?
        if ($(maintab).scrollTop() + $(maintab).innerHeight() + bottom_load_pixel_height >= $(maintab)[0].scrollHeight) inrange = 1;
        //console.log('maintab: '+$(maintab).scrollTop() + ' + '+$(maintab).innerHeight() + ' + ' + bottom_load_pixel_height + ' >= ' + $(maintab)[0].scrollHeight);

        // is the page not tall enough to trigger a scroll?
        if ($('#sidebar_nav_inner').innerHeight()<$(maintab).innerHeight()) {
            protect_lg = 1;
            inrange = 1;
        }

        //console.log('in desktop range: '+inrange);
        //if (inrange) console.log('protecting lg: '+protect_lg);

        if (mt_to == undefined && inrange) {
            if (protect_lg) setTimeout('get_next_posts(42)', 42);
            mt_to = setTimeout('$(".next_link").trigger("click");', to);
        } else if (inrange) {
          if (to==42) setTimeout('get_next_posts(42)', 42);
        }
   }

   function check_frame_height() {
        var vis = $(window).height();
        var hdr = $('div.header').height();
        var per = hdr / vis * 100;
        per = 100 - per;
        per = Math.round( per );
        $('.my-col').css('height', per+'%');
   }
