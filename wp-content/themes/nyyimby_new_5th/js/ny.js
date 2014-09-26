
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

        setTimeout("jQuery('.my-col').niceScroll({ autohidemode: false, cursorwidth: 10, cursorcolor:'#333'});", 250);

        $('.navbar-toggle').on('click', function() {
          setTimeout('toggle_nav()', 1000);
        });

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
            sticky_tops();
        });
        get_next_post(0);

        // TODO: find out why bs 3 affix would not work...i think it's because it expects a more shallow canvas
        //setTimeout("console.log('yay');jQuery('.affix').affix({offset:{top:100}});console.log('boo');",5000);

        reset_post_menu_vars('post');
        reset_post_menu_vars('menu');
        set_share_link_post_hover();

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
        // try to scroll the page by 0

        var vis = $(window).height();
        var hdr = $('div.header').height();

        // this has to be there or cols have no scrolling height
        $('.my-col, .my-col-noscroll').css('height', (vis - hdr)+'px');
        $('.rb-gray').css('height', $('#stuff').height()+'px');

        //$('.ads-col img').addClass('img-responsive');
// this is useful as a start to affixing the ads panel
        //var stp = $('div.a-ffix').scrollTop();
//        $('.my-col-noscroll').css('height', (vis - hdr)+'px')
 //       .animate({'margin-top':(stp-hdr)});


//this needs to be thrown away:
        /*var per = hdr / vis * 98;
        per = 100 - per;
        per = Math.round( per );
        $('.my-col').css('height', per+'%');*/
   }
   function sticky_tops() {
        //console.log('sticky_tops');
        /*jQuery('.my-col-noscroll').each(function() {
            var mom = $(this).parent('div');
            var mom_ht = mom.height();
            var mom_wt = mom.width();
            mom.css({'min-height':mom_ht, 'height':mom_ht});
            mom.css({'min-width' :mom_wt, 'width' :mom_wt});
            //$(this).css({'position':'fixed', 'width':mom_wt+'px', 'height':mom_ht+'px'});
        });*/
   }
   function toggle_nav() {
           if ($('#main-navbar-collapse').hasClass('in')) {
                var ht = $('#site-navigation').height();
                $('.my-col').hide();
                $('body').css({'height':ht,'overflow-y':'scroll'});
            } else {
                $('body').css({'height':'100%', 'overflow-y':'hidden'});
                $('.my-col').fadeIn();
            }
    }
