// go to line 88 to skip mail chimp

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

    // Social icon link and active menu highlight vars
    var posts_on_page;
    var menus_on_page; 

    // set the percentage that changes the active post
    var window_active_post_line = .5;

    // Navigation
    $(document).on('ready', function() {

        $('.my-col').niceScroll({cursorcolor:"#333"});

        $('#cx').jscroll({
            loadingHtml: '<img src="/wp-content/themes/nyyimby_new_5th/img/jjloader.gif" alt="Loading">',
            padding: 20,
            nextSelector : ".navx-links a[rel=prev]",
            contentSelector: "div.post",
            autoTrigger: false,
            callback: page_loaded,
            debug: false
        });

        $('#sidebar_nav_inner').jscroll({
            //nextSelector : ".navx-links a[rel=prev]",
            loadingHtml: '<img src="/wp-content/themes/nyyimby_new_5th/img/jjloader.gif" alt="Loading">',
            padding: 20,
            nextSelector: ".next_link",
            contentSelector: "div.test_inner_news",
            autoTrigger: false,
            callback: menu_page_loaded,
            debug: false
        });

        $('#main_tab').scroll(function() {
            get_next_posts(100);
        });
        get_next_posts(1000);

        $('.my-col.cx').scroll(function() {
            get_next_post(100);
        });
        get_next_post(0);

        reset_post_menu_vars('post');
        reset_post_menu_vars('menu');
        set_share_link_post_hover();

        $(window).resize(check_frame_height);

   });

   function reset_post_menu_vars(pm) {
        if (pm=='post') posts_on_page = $('.on-page-post');
        else menus_on_page = $('.on-page-menu'); 
   }

   var set_share_link_post_hover_loop = 500;
   function set_share_link_post_hover() {
        // for debugging purposes...only show in test
        $('.posts-count').html(posts_on_page.length);
        $('.menus-count').html(menus_on_page.length);

        var cur_post_id = get_post_id();
        if (cur_post_id !== undefined) {

            // turn off active for all menu post choices
            $('.on-page-menu').parent().removeClass('active-menu-post');

            // get the menu post
            var el = $('a[data-id='+cur_post_id+']').parent();

            // set it to active
            el.addClass('active-menu-post');

            // set the share icon stuff
//console.log('setting share stuff: '+cur_post_id);
//console.log(addthis_share);
//            addthis_share.url    =  'test';
//            addthis_share.title  =  $('#'+cur_post_id).find('h1').text();
//            addthis.toolbox('.addthis_sharing_toolbox', addthis_config, addthis_share);
        }

        // the active one should always be in the middle if it can
        //$('#main_tab').scrollTo(el);

        setTimeout(set_share_link_post_hover, set_share_link_post_hover_loop);
   }

   function get_post_id() {
        var post_id = 0;
        $.each(posts_on_page, function() {
            if (isElementInViewport($(this))) {
                post_id = $(this).attr('id');
                return false;
            }
        });
        return post_id;
   }

   // adpated from http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
   function isElementInViewport (el) {
        //special bonus for those using jQuery
        if (el instanceof jQuery) {
            el = el[0];
        }
        var rect = el.getBoundingClientRect();
        var win_ht = parseInt($(window).height());
        var myline = win_ht * window_active_post_line;

        var one = (rect.top <= myline && rect.bottom >= myline);

        // console.log('id: '+el.id+' top: '+rect.top+' bottom: '+rect.bottom+' myline: '+myline+' and...'+one);

        var retval = (one);
        return retval;
   }

   // global scope:
   var bottom_load_pixel_height = 500;
   var maintab = $('#main_tab');
   var posttab = $('.my-col.cx');
   var pt_to = undefined;
   var mt_to = undefined;

   function page_loaded() {
        pt_to=undefined; 
        reset_post_menu_vars('post');
   }
   function menu_page_loaded() {
        mt_to=undefined;
        reset_post_menu_vars('menu');
   }

   // single post
   function get_next_post(to) {
        check_frame_height();
        var ht = $(window).height()/2;
        var bottom_load_pixel_height = ht || 200;
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

   // menus of posts
   function get_next_posts(to) {
        // check to see if we even have a menu showing!        

        var el = $('#main_tab:visible');
        if (el.length < 1) {
             $('#main_tab').remove();
             return false;
        }

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
        $('.my-col').css('height', (vis - hdr)+'px');
        /*var per = hdr / vis * 98;
        per = 100 - per;
        per = Math.round( per );
        $('.my-col').css('height', per+'%');*/
   }
