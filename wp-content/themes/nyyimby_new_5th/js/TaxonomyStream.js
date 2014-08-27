/**
 * Continuous stream for the taxonomy pages
 * @type {TaxonomyStream|*}
 */



var TaxonomyStream = TaxonomyStream || (function()
{

    "use strict";



    /**
     * Continuous stream for the taxonomy pages
     * @constructor
     */

    var TaxonomyStream = function()
    {

        this.proxy                    =  {};
        this.proxy.onEndReach         =  jQuery.proxy(onEndReach, this);
        this.proxy.onScrollUpdateURL  =  jQuery.proxy(updateURL, this);

        // Kick-off
        initialize.call(this);
    };



    /*****************
     * PRIVATE METHODS
     */

    var initialize = function()
    {

        // console.info( 'Kicking off the continuous stream for the taxonomy pages.' );

        views.call(this);
        updateURL.call(this);
        highlightCurrentArticle.call(this);
        jQuery(window).on('scroll', this.proxy.onEndReach);
    };



    /**
     * Store the views
     */

    var views = function()
    {

        this.dom                  =  {};

        this.dom.window           =  jQuery(window);

        this.dom.sidebar          =  jQuery('div.test_inner_news ul.media-list');
        this.dom.sidebar.item     =  this.dom.sidebar.find('li.media');
        this.dom.sidebar.current  =  this.dom.sidebar.item.first();
        this.dom.sidebar.next     =  this.dom.sidebar.current.nextAll('li.media').first();

        this.URL                  =  {};
        this.URL.current          =  this.dom.sidebar.current.find('a').attr('href');
        this.URL.next             =  this.dom.sidebar.next.find('a').attr('href');
    };



    /**
     * Update view
     */

    var update = function()
    {

        reloadAds.call(this);
        getCurrentArticle.call(this);
        updateURL.call(this);
        highlightCurrentArticle.call(this);
        getNextArticle.call(this);
    };



    /**
     * Get current article
     */

    var getCurrentArticle = function()
    {

        this.dom.sidebar.current  =  this.dom.sidebar.next;
        this.URL.current          =  this.dom.sidebar.current.find('a').attr('href');
    };



    /**
     * Get next article
     */

    var getNextArticle = function()
    {

        this.dom.sidebar.next     =  this.dom.sidebar.current.nextAll('li.media').first();
        this.URL.next             =  this.dom.sidebar.next.find('a').attr('href');
    };



    /**
     * Highlight current article
     */

    var highlightCurrentArticle = function()
    {

        this.dom.sidebar.item.find('p').removeClass('highlight');
        this.dom.sidebar.current.find('p').addClass('highlight');
        var title = this.dom.sidebar.current.find('p').text();

        updateTitle.call(this, title);
    };



    /**
     * Update URL
     */

    var updateURL = function()
    {

        var state  =  {};
        history.replaceState(state, document.title, this.URL.current);

        // Google Analytics
        _gaq.push(['_trackPageview', this.URL.current]);
    };



    /**
     * Update title
     */

    var updateTitle = function(title)
    {

        window.document.title = title;
    };



    /**
     * Category -> Neighbourhood
     */

    var transition = function()
    {

        // console.log( 'Transition form Taxonomy stream.' );

        var dom            =  {};
        dom.container  =  jQuery('div.post-wrapper');
        dom.link       =  dom.container.find('a[href*="category"]');

        dom.link.each(function()
        {

            var current  =  jQuery(this)
                , def      =  current.attr('href');

            def = def.replace('category', 'neighborhoods')
            current.attr('href', def);
        });
    };

    /**
     * Reload the sidebar ads
     */

    var reloadAds = function()
    {

        jQuery('div#related_updates').load(window.location.href + '  div#related_updates');
    };



    /**
     * Load next article
     */

    var loadNextArticle = function()
    {

        var self = this;

        jQuery('<div/>').load(this.URL.next + ' div.post', function()
        {

            $(this).appendTo('div#cx');
            update.call(self);

            // TODO: CLEAN THIS UP - AS METHOD
            setTimeout(function()
            {

                addthis.toolbox('.addthis_toolbox');
            }, 1000);
        });
    };



    /**
     * On end reach
     */

    var onEndReach = function()
    {

        var self = this;

        if( this.dom.window.scrollTop() + this.dom.window.height() == $(document).height() )
        {

            loadNextArticle.call(self);
        }
    };



    return TaxonomyStream;
})();
