var ImageCycle = ImageCycle || (function()
{

    "use strict";


    /**
     * Cycle through post images
     * @constructor
     */

    var ImageCycle = function()
    {

        this.proxy              =  {};
        this.proxy.updateState  =  jQuery.proxy(states, this);


        // Kick-off
        initialize.call(this);
    };



    /**
     * Setup gallery mode
     * @public
     */

    ImageCycle.prototype.setupGalleryMode = function()
    {

        this.view.link.each(function()
        {

            jQuery(this).attr(
            {

                'href'  :  jQuery(this).children('img').attr('src'),
                'rel'   :  'ny-gallery'
            });

            jQuery(this).on('click', function(e) { e.preventDefault(); });
        });
    };



    /******************
     * PRIVATE METHODS
     */

    var initialize = function()
    {

        views.call(this);
        states.call(this);

        this.setupGalleryMode();

        this.view.window.on('resize', this.proxy.updateState);
    };



    /**
     * Load FancyBox asynchronously
     * @public
     */

    ImageCycle.prototype.loadFancyBox = function()
    {

        // Asynchronously include FancyBox - jj wonders why u loaded this 500 times per page
        // even though you also had the same exact include in your js section in the footer?
        //jQuery.getScript('/wp-content/themes/nyyimby_new_5th/js/jquery.fancybox.js');

        // Load FancyBox on desktop, destroy it on mobile
        this.state.isDesktop  ?  run.call(this)  :  jQuery(document).unbind('click.fb-start');

        function run()
        {

            this.view.link.fancybox(
            {
                'autoCenter' : 'false',
                'nextEffect' : 'none',
                'aspectRatio' : 'true',
                'fitToView': 'true',
                onBefore: function()
                {

                    jQuery('div.fancybox-wrap').css(
                    {
                        'border' : '1px solid deeppink',
                        'left' : jQuery('div.left_post_navasd h1').offset().left
                    }).fadeIn();
                },
                onUpdate: function()
                {

                    jQuery('div.fancybox-wrap').css(
                    {
                        'opacity' : '1',
                        'left' : jQuery('div.left_post_navasd h1').offset().left
                    }).fadeIn();
                }
            });
        }
    };



    /**
     * Get and store views
     * @private
     */

    var views = function()
    {

        this.view         =  {};
        this.view.window  =  jQuery(window);
        this.view.image   =  jQuery('div.post img');
        this.view.link    =  this.view.image.parent('a');
    };



    /**
     * Define devices and states
     * @private
     */

    var states = function()
    {

        this.state            =  {};
        this.state.isDesktop  =  this.view.window.width() >= 1025;
        this.state.isMobile   =  !this.state.isDesktop;

        this.loadFancyBox.call(this);
    };



    return ImageCycle;
})();
