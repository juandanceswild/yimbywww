/**
 * Sidebar functionality - AJAX
 * @type {TaxonomyStream|*}
 */



var Sidebar = Sidebar || (function()
{

    "use strict";



    /**
     * Sidebar functionality
     * @constructor
     */

    var Sidebar = function()
    {

        this.proxy  =  {};
    };



    /*************************
     * PUBLIC INSTANCE METHODS
     */

    Sidebar.prototype.initialize = function()
    {

        views.call(this);
        this.dom.sidebar.item.on('click', { event  :  'ev' }, load);
    };



    Sidebar.prototype.home = function()
    {

        var logo  =  jQuery('a.brand');
            logo.on('click', function() { window.location.href = '/'; });
    };


    /*****************
     * PRIVATE METHODS
     */



    /**
     * Store the views
     * @private
     */

    var views = function()
    {

        this.dom                  =  {};

        this.dom.window           =  jQuery(window);

        this.dom.sidebar          =  jQuery('div.test_inner_news ul.media-list');
        this.dom.sidebar.item     =  this.dom.sidebar.find('li.media a');
    };



    /**
     * Load article functionality
     * @private
     */

    var load = function(ev)
    {

        ev.preventDefault();

        var item       =  jQuery(this)
          , link       =  item.attr('href')
          , title      =  item.text()
          , isCurrent  =  jQuery(this).find('p').hasClass('highlight')  ?  true  :  false;

        !isCurrent     && query.call(this, link, title);
    };



    /**
     * AJAX query
     * @private
     */

    var query = function(link, title)
    {

        jQuery('<div/>').load(link + ' div.post', function()
        {

            var state  =  {};

            history.replaceState(state, document.title, link);
            window.document.title = title;

            // Google Analytics
            _gaq.push(['_trackPageview', link]);

            // Append newly loaded content
            $(this).appendTo('div#cx').addClass('added');

            // Scroll to newly loaded content
            $.scrollTo( jQuery('div.added').last(), 800,
            {

                offset: -80,
                onAfter: function()
                {

                    reloadAds.call(this);
                }
            });

            jQuery.ias().initialize();

            var singlePageCycle = new ImageCycle();
                singlePageCycle.setupGalleryMode();
        });
    };


    /**
     * Reload the ads in the sidebar
     * @private
     */

    var reloadAds = function()
    {

        jQuery('div#related_updates').load(window.location.href + '  div#related_updates');

        updateSocial.call(this);
    };


    /**
     * Update social
     * @private
     */

    var updateSocial = function()
    {

        addthis_share.url    =  window.location.url;
        addthis_share.title  =  jQuery('div.post').last().find('h1').text();
        addthis.toolbox('.addthis_sharing_toolbox', addthis_config, addthis_share);
    };



    return Sidebar;
})();
