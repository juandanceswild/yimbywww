jQuery(function ($) {


    var siteURL = "http://newyorkyimby.com";
    var firstLoad = true;

    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    window.addEventListener('popstate', function (event) {
        event.preventDefault();
        if (firstLoad === false) {
            loadAjaxContent(location.href);
        }
        return true;
    });

    function loadAjaxContent(href) {
        $('.post_content_area').scrollTop(0);
        $("#right-col").scrollTop(0);

        $.ajax({
            url: "/wp-admin/admin-ajax.php",
            type: 'POST',
            data: "action=wpa_post_load&href=" + href,
            success: function (html) {
                $('.post_content_area').html(html);    // This will be the div where our content will be loaded
                loadDynamicContent();

                $('.post_content_area').find('a.left_nav_link', html).each(function () {

                });

            }
        });
    }

    $('#main_image_thumbnails img').on('click', function (e) {
        e.preventDefault();

        var selected_image = $(this).attr('data-target');
        var caption = $(this).attr('alt');
        $('#blog_post_main_image').attr('src', selected_image);
        $('.blog_main_desktop').attr('src', selected_image);
        $('#photo_caption').html(caption);
    });

});

