
    // Fixed social icons
//    var social = new FixedSocial();

    // Advanced search
    var search = new AdvancedSearch();

    // Social icon link and active menu highlight vars
    var posts_on_page;
    var menus_on_page; 

    // set the percentage that changes the active post
    var window_active_post_line = .5;

    // for use in js optimization
    var last_post_id = 0;

    var fo_to = setTimeout('', 0);

    // Navigation
    $(document).on('ready', function() {

        $.fn.scrollMenuTo = function(scroller, elem) {

            var debug = 1;

            if (elem.length > 1) {
                elem = elem.last();
                if (debug) console.log('element was given two objects: setting to last for now...');
            }
            if (debug) console.log(scroller);
            if (debug) console.log('wants to scroll to ');
            if (debug) console.log(elem);

            var tst = scroller.scrollTop();
            var to = scroller.offset();
            var tot = (to===undefined) ? 0 : to.top;

            var eo = $(elem).offset();
            var eot = (eo===undefined) ? 0 : eo.top;


            var s = tst - tot + eot;

            // account for the date height if there is a date heading before it
            var dh = elem.prev('li');
            if (dh.hasClass('dateHeading')) { s = (s-40); if (s < 0) s = 0; }
            // now account for the taxonomy header
            if (elem.parent('ul').prev('.archive-title').length>0) s = (s-40);

            scroller.scrollTop(s);
            
            return this;
        };

        addthis.init();

        setTimeout('fix_body_width();', 1000);

        setTimeout("jQuery('.my-col').niceScroll({ autohidemode: false, cursorwidth: 10, cursorcolor:'#333'});", 250);

        do_dom_listeners($);

        get_next_post(0);
        get_next_posts(1000);

        // TODO: find out why bs 3 affix would not work...i think it's because it expects a more shallow canvas
        //setTimeout("console.log('yay');jQuery('.affix').affix({offset:{top:100}});console.log('boo');",5000);

        reset_post_menu_vars('post');
        reset_post_menu_vars('menu');
        set_share_link_post_hover();

        // ads are normally filled when the post is found but other pages need them too
        if (posts_on_page[0]===undefined) fill_ads();

        $(window).resize(check_frame_height);
        check_frame_height();

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
        var same = (cur_post_id == last_post_id) ? true : false;
        if (! same) {

            //console.log('yay, now a new post because '+cur_post_id+' != '+last_post_id);
            //console.log('cur_post_id: '+cur_post_id);
            //console.log('last_post_id: '+last_post_id);

            last_post_id = cur_post_id;

            // go get some new ads, finally
            fill_ads();

            // turn off active for all menu post choices
            $('.menujax').parent().removeClass('active-menu-post');

            // get the menu post
            var el = $('a[data-id='+cur_post_id+']').parent('li');

            // set it to active
            el.addClass('active-menu-post');

            // and bring it to the top of it's scrollable area
console.log('set_share_link_post_hover is about to scroll...');
//console.log(posts_on_page);
//console.log(menus_on_page);
            var scroller = el.parents('.my-col');
            if (scroller === undefined || scroller.length < 1) {
console.log('okay, it\'s the empty scroller bug');
                
            }
            scroller.scrollMenuTo(scroller, el);


            /* this is mostly all the original code (updated slightly) that updates the url, calls google, and share icons */ var state = {}; if (!window.history || !window.history.replaceState) { return; }

            var currentURL    = el.find('.media-body > a').attr('href');
            var currentTitle  = el.find('.media-body > a > p').text();

            history.pushState({"pageTitle":currentTitle}, '', currentURL);

            // Google Analytics
            _gaq.push(['_trackPageview', currentURL]);

            window.document.title = currentTitle;

            /* and this the last of it interesting..it likely was a 89% solution to a problem...but this also is where the multiple addthis bars popping up was coming from.  so this culprit then is also solved */
            setTimeout(function() {
                addthis_share = {};
                addthis_share.url    =  currentURL;
                addthis_share.title  =  currentTitle;
                addthis.toolbox('#soc', null, addthis_share);
            },500);


        } else {
            //console.log('we don\'t do anything because '+cur_post_id+' == '+last_post_id);
            //console.log('cur_post_id: '+cur_post_id);
            //console.log('last_post_id: '+last_post_id);
        }


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
        check_frame_height();
   }
   function menu_page_loaded() {
        mt_to=undefined;
        reset_post_menu_vars('menu');
        check_frame_height();
   }

   // single post
   function get_next_post(to) {
        check_frame_height();
        var ht = $(window).height()/2;
        var bottom_load_pixel_height = ht || 200;
        var inrange = 0, protect_lg = 0;

        if ($(posttab)[0] == undefined) return;

        new ImageCycle();

        // TODO: this is case and pasted from get_next_posts...encapsulate this into something reusable
        // is the page still not able to have jscroll attached to it??
        if ($(posttab)[0].scrollHeight == undefined) inrange = 1;

        // is the page scrolled almost all the way down?
        if ($(posttab).scrollTop() + $(posttab).innerHeight() + bottom_load_pixel_height > $(posttab)[0].scrollHeight) inrange = 1;

        // is the page not tall enough to trigger a scroll?
        if ($('div.post').innerHeight() < posttab.innerHeight()) {
            protect_lg = 1;
            inrange = 1;
        }
        //console.log('inragne: '+inrange);

        $('div.post').find('img').addClass('img-responsive');

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
        reset_post_menu_vars('menu');
        set_menujax_listeners();

        var el = $('#main_tab:visible');
        if (el.length < 1) {
             return false;
        }

        check_frame_height();
        var bottom_load_pixel_height = 100;
        var inrange = 0, protect_lg = 0;

        if ($(maintab)[0] == undefined) return;

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
        // try to scroll the page by 0

        var win = $(window).width();
        var vis = $(window).height();
        var hdr = $('div.header').height();

        // firstly (because it's quick) hide the ads based on height
        if (vis < 698) $('#adrotate_widgets-3').fadeOut();
        if (vis > 698) $('#adrotate_widgets-3').fadeIn();

        // this has to be there or cols have no scrolling height
        $('.my-col, .my-col-noscroll').css('height', (vis - hdr)+'px');
        var bht = ($('#stuff').height() > vis) ? $('#stuff').height() : vis; 
        $('.rb-gray').css('height', bht+'px');

        // set the share icons location
        $('#stuff').prepend($('#soc'));
        switch(true) {
            case (win < 1025): x = 14; break;
            case (win < 1200): x = 20; break;
            default:           x = 2;
        }
        $('#soc').css({'left':'','margin-left':$('#stuff').width()-x, 'margin-top': '20px'});
   }
   function fix_body_width() {
        jQuery("html,body").on({
          'swipe': function(e) {
            e.preventDefault()
          },
          'touchmove': function(e) {
            e.preventDefault()
          },
        });
   }
   function toggle_nav() {
           if ($('#main-navbar-collapse').hasClass('in')) {
                var ht = $('#site-navigation').height();
                $('.my-col').fadeOut();
                $('body').css({'height':ht,'overflow-y':'scroll'});
            } else {
                $('body').css({'height':'100%', 'overflow-y':'hidden'});
                $('.my-col').fadeIn();
            }
    }
    function fill_ads() {
        $.ajax({'url':'/ad_rotate.php'}).done(function(r){$('#ads').html(r)});
    }

    var to_1 = setTimeout('', 0);
    function do_dom_listeners($) {
        $('.navbar-toggle').on('click', function() {
          setTimeout('toggle_nav()', 1000);
        });

        $('#cx').jscroll({
            loadingHtml: '<img src="/wp-content/themes/nyyimby_new_5th/img/jjloader.gif" alt="">',
            padding: 20,
            nextSelector : ".navx-links a[rel=prev]",
            contentSelector: "div.post",
            autoTrigger: false,
            callback: page_loaded,
            debug: false
        });

        $('#sidebar_nav_inner').jscroll({
            //nextSelector : ".navx-links a[rel=prev]",
            loadingHtml: '<img src="/wp-content/themes/nyyimby_new_5th/img/jjloader.gif" alt="">',
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

        $('.my-col.cx').scroll(function() {
            get_next_post(100);
        });
    }

    function set_menujax_listeners() {
        $('.menujax').off('click');
        $('.menujax').click(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var el = $('#'+id);
            if (! el.length) {
                load_ajax_content($(this).attr('href'));
            } else {
                clearTimeout(to_1);
console.log('set_menuajax_listeners is calling load_ajax_delay_scroll');
                to_1 = setTimeout('load_ajax_delay_scroll("#'+id+'")', 250);
            }
        });
    }

    function load_ajax_content(href) {
        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: "action=wpa_post_load_jj&href=" + href,
            success: function (html) {
                
                var htm = $(html).html(); // this removes teh outer div.post
                $('.last-ajaxed').removeClass();

                var el = $(htm).find('div.on-page-post').first();
                el.addClass('last-ajaxed');
                el.find('.navx-links').remove();

                $('#cx .jscroll-inner').append(el);

                reset_post_menu_vars('menu');
                set_menujax_listeners();

                reset_post_menu_vars('post');
                set_share_link_post_hover();

                clearTimeout(to_1);
console.log('load_ajax_content is calling load_ajax_delay_scroll');
                load_ajax_delay_scroll("#cx .last-ajaxed");
            }
        });
    }
    function load_ajax_delay_scroll(el_sel) {
        check_frame_height();
        var scroller = $('#cx').parents('.my-col');
        var el = $(el_sel);
console.log('load_ajax_delay_scroll is about to scroll...');
        scroller.scrollMenuTo(scroller, el);
    }
