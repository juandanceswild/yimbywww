var FixedSocial = FixedSocial || (function()
{

    "use strict";


    /**
     * Fixed social icons
     * @constructor
     */

    var FixedSocial = function()
    {

        this.proxy        =  {};
        this.proxy.pin    =  jQuery.proxy(pin, this);

        // Kick-off
        initialize.call(this);
    };


    /******************
     * PRIVATE METHODS
     */

    var initialize = function()
    {

        addthis.init();

        views.call(this);
        state.call(this);

        pin.call(this);
        this.dom.window.on('resize', this.proxy.pin);
        this.dom.window.on('resize', this.proxy.align);

    };



    /**
     * Get and store views
     * @private
     */

    var views = function()
    {

        this.dom          =  {};
        this.dom.window   =  jQuery(window);
        this.dom.icons    =  jQuery('div.soc');
        this.dom.heading  =  jQuery('div.post-wrapper h4').first();
    };


    /**
     * States
     * @private
     */
    var state = function()
    {

        this.state            =  {};
        this.state.isDesktop  =  this.dom.window.width() >= 1245;
    };



    /**
     * Pin social icons
     * @private
     */

    var pin = function()
    {

        this.state.isDesktop  =  this.dom.window.width() >= 1245;

        if ( jQuery(window).width() >= 1245 && !jQuery('body').hasClass('page-template-default') )
        {

            var desktopOffsetLeft = jQuery('div#cx').offset().left + jQuery('div#cx').width() - 22;
            this.dom.icons.attr('style', 'position: fixed; top: 78px; left: ' + desktopOffsetLeft + 'px !important');

            // console.log( 'Desktop, add fixded right positioning.' );
        }
        else if ( !this.state.isDesktop )
        {

            var mobileOffsetLeft = jQuery('div.post h1').offset().left - jQuery('div.post h1').parent().offset().left
            this.dom.icons.css('position', 'absolute').attr('style', 'left: ' + mobileOffsetLeft + 'px !important;');

            // console.log( 'Mobile, add static positioning below the headline.' );

            // Default page template
            jQuery('ul.nav.main_menu_nav').addClass('header-align');
        }
    };


    return FixedSocial;
})();
