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
        this.dom.document     =  jQuery(document);
        this.dom.result       =  jQuery('div.res-box a');
        this.dom.overlay      =  jQuery('div.overlay');
        this.dom.modal        =  jQuery('div.modal-content');


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

        var self = this;

        jQuery('<div/>').load(jQuery(post).attr('href') + ' div.post', function()
        {

            var content = jQuery(this);

            // Show the modal
            show.call(self, content);
        });
    };



    /**
     * Show the modal w/ the loaded content
     * @private
     * @content
     */

    var show = function(content)
    {

        // Remove old content (flush)
        flush.call(this);

        // Append AJAX content
        content.appendTo( this.dom.modal );

        // Show the modal
        this.dom.overlay.fadeIn();
        this.dom.modal.fadeIn();

        // Center in viewport
        // TODO: CLEAN THIS UP -> PRIVATE METHOD
        jQuery.fn.center = function () {
            this.css("position","absolute");
            this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                $(window).scrollTop()) + "px");
            this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                $(window).scrollLeft()) + "px");
            return this;
        };

        this.dom.modal.center();

        setTimeout(function()
        {

            addthis.toolbox('.addthis_toolbox');
        }, 1000);

        // Scroll to modal
        $.scrollTo( this.dom.modal.find('h1'), 800, { offset: -100 } );
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
            frame.css('min-height', jQuery(window).height());
    };



    /**
     * Equal search result boxes
     * @private
     */

    var equalBoxes = function()
    {

        var box      =  jQuery('div.res-box')
          , highest  =  -1;


        box.each(function()
        {

            highest = highest > jQuery(this).height() ? highest : jQuery(this).height();
        });


        box.each(function()
        {

            jQuery(this).height(highest);
        });
    };





    return SearchResults;
})();

