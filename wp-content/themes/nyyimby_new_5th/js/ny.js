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

        $('#sidebar_nav_inner').jscroll({
            //nextSelector : ".navx-links a[rel=prev]",
            padding: 20,
            nextSelector: ".next_link",
            contentSelector: "div.test_inner_news",
            autoTrigger: false,
            callback: menu_page_loaded,
            debug: true
        });

        if ($('#sidebar_nav_inner').innerHeight()+', '+$('#main_tab').innerHeight()) {
            $(".next_link").trigger("click");
        }

        $('#main_tab').scroll(function() {
            if (mt_to == undefined && $(this).scrollTop() + $(this).innerHeight()>=$(this)[0].scrollHeight) {
                mt_to = setTimeout('$(".next_link").trigger("click");', 100);
            }
        });

   });

   // global scope:
   var mt_to = undefined;
   function menu_page_loaded() {
        mt_to=undefined;
   }
