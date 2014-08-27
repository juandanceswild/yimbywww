var SearchResults = SearchResults || (function()
{
    "use strict";



    /**
     * Search results functionality
     * @constructor
     */

    var SearchResults = function()
    {

        this.proxy            =  {};
        this.proxy.load       =  jQuery.proxy(this.load, this);
        this.proxy.close      =  jQuery.proxy(close, this);

        this.dom              =  {};
        this.dom.html         =  jQuery('html');
        this.dom.body         =  jQuery('body');
        this.dom.document     =  jQuery(document);
        this.dom.result       =  jQuery('div.res-box a');
        this.dom.overlay      =  jQuery('div.overlay');
        this.dom.modal        =  jQuery('div.modal-content');
        this.dom.social       =  jQuery('.addthis_sharing_toolbox');
        this.dom.title        =  window.document.title;
        this.dom.url          =  window.location.href;


        // Kick-off
        initialize.call(this);
    };





    /************************
     * PUBIC INSTANCE METHODS
     */



    /**
     * Show selected result in modal dialogue
     * @public
     * @param ev
     */

    SearchResults.prototype.load = function(ev)
    {

        ev.preventDefault();

        // Run the AJAX query
        query.call(this, ev.currentTarget);
    };





    /*****************
     * PRIVATE METHODS
     */

    var initialize = function()
    {

        this.dom.result.on('click', { ev: 'ev' }, this.proxy.load);
        this.dom.overlay.on('click', { ev: 'ev' }, this.proxy.close);
        this.dom.modal.on('click', function() { return false; });

        sidebar.call(this);
        maxHeight.call(this);
        equalBoxes.call(this);
    };



    /**
     * Load selected post via AJAX
     * @private
     * @post - selected post
     */

    var query = function(post)
    {

        var self    =  this
          , url     =  jQuery(post).attr('href');

        jQuery('<div/>').load(url + ' div.post', function()
        {

            var content = jQuery(this)
              , title   = jQuery(this).find('div.post-wrapper h1').text();

            // Show the modal
            show.call(self, content, url, title);
        });
    };


    /**
     * Updates the URL for the sharing functionality
     * @private
     */

    var updateURL = function(url)
    {

        var state = {};
        history.pushState(state, document.title, url);
    };



    /**
     * Show the modal w/ the loaded content
     * @private
     * @content
     */

    var show = function(content, url, title)
    {

        var self = this;

        // Remove old content (flush)
        flush.call(this);

        // Append retrieved content to the modal
        content.appendTo( this.dom.modal );

        // Show the modal
        this.dom.overlay.fadeIn();
        this.dom.modal.fadeIn().css({
            'width' :  jQuery('div#entry-content').width() - 20,
            'left'  :  jQuery('div#cx').offset().left
        });

        // Add locked class on the body and the html
        jQuery('html, body').addClass('locked');

        jQuery(window).on('resize', function()
        {

            self.dom.modal.css('width', jQuery('div#entry-content').width() - 20);
        });


        // Initialize the social sharing
        initSocial.call(this, url, title);

        // Link binding
        bindLinks.call(this);
    };


    /**
     * Bind links
     * @private
     */

    var bindLinks = function()
    {

        this.dom.modal.find('a').on('click', function()
        {

            window.location.href = jQuery(this).attr('href');
        });
    };



    /**
     * Close the modal
     * @private
     * @param ev
     */

    var close = function(ev)
    {

        ev.preventDefault();

        // Hide the modal
        this.dom.overlay.fadeOut();
        this.dom.modal.fadeOut();

        window.document.title = this.dom.title;

        var state = {};
        history.pushState(state, document.title, this.dom.url);
    };



    /**
     * Flush the modal content
     * @private
     */

    var flush = function()
    {

        this.dom.modal.html('');
    };


    /**
     * Sidebar functionality
     * @private
     */

    var sidebar = function()
    {


        var last          =   jQuery('form.searchandfilter ul li:nth-child(5) > ul li').last();


        // Include show all copy
        last.after('<a class="show" href="#" title="">Show all</a>');


        var neighborhood  =  jQuery('form.searchandfilter ul li:nth-child(5) > ul li:gt(5)')
          , button        =  jQuery('a.show');


        var range         =  {};
            range.first   =  jQuery('input.postform').first();
            range.last    =  jQuery('input.postform').last().parent('li');


        // Hide the rest of the Neighborhoods items
        neighborhood.hide();


        // Show the rest of the items
        button.on('click', function(e) {

            e.preventDefault();
            neighborhood.show();
            button.hide();
        });


        // Include clearfix
        range.first.before('<span>From</span>');
        range.last.before('<span>to</span>');
    };


    /**
     * Max height for the center frame
     * @private
     */

    var maxHeight = function()
    {

        var frame  =  jQuery('div#entry-content');
            frame.css('min-height', jQuery(window).height() - 178);
    };



    /**
     * Equal search result boxes
     * @private
     */

    var equalBoxes = function()
    {

        var box      =  jQuery('div.res-box')
          , highest  =  -1;

        setTimeout(function() {
            box.each(function()
            {

                highest = highest > jQuery(this).height() ? highest : jQuery(this).height();
            });


            box.each(function()
            {

                jQuery(this).height(highest);
            });
        }, 1000);
    };


    /**
     * Initialize social icons and position them
     * @private
     */

    var initSocial = function(url, title)
    {

        var state = {};
        history.pushState(state, document.title, url);
        window.document.title = title;

        setTimeout(function()
        {

            addthis_share.url = url;
            addthis_share.title = title;
            addthis.toolbox('.addthis_sharing_toolbox', addthis_config, addthis_share);

            jQuery('div.soc').css(
            {

                'top'   :  78,
                'left'  :  jQuery('div#cx').offset().left + jQuery('div#cx').width() - 22
            });
        }, 1000);

        jQuery(window).on('resize', function()
        {

            jQuery('div.soc').css(
            {

                'left'  :  jQuery('div#cx').offset().left + jQuery('div#cx').width() - 22
            });
        })


        $('#main_image_thumbnails img').on('click', function (e) {
            e.preventDefault();

            var selected_image = $(this).attr('data-target');
            var caption = $(this).attr('alt');
            $('#blog_post_main_image').attr('src', selected_image);
            $('.blog_main_desktop').attr('src', selected_image);
            $('#photo_caption').html(caption);
        });
    };


    return SearchResults;
})();

