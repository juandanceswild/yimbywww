var AdvancedSearch = AdvancedSearch || (function()
{
    "use strict";


    /**
     * Advanced search functionality
     * @constructor
     */

    var AdvancedSearch = function()
    {

        this.proxy         =  {};
        this.proxy.submit  =  jQuery.proxy(submit, this);


        // Kick-off
        // initialize.call(this);
    };



    /************************
     * PUBIC INSTANCE METHODS
     */


    /**
     * Sample method
     * @public
     */

    AdvancedSearch.prototype.method = function()
    {

        // console.log( 'Public method.' );
    };



    /************************
     * PRIVATE METHODS
     */


    /**
     * Collect and store the DOM elements
     * @private
     */

    var dom = function()
    {

        this.dom          =  {};
        this.dom.sidebar  =  jQuery('div.refine');
        this.dom.submit   =  this.dom.sidebar.find('input[type="submit"]');
        this.dom.text     =  this.dom.sidebar.find('input[type="text"]');
        this.dom.date     =  this.dom.sidebar.find('input[type="date"]');
    };


    /**
     * Initialize
     * @private
     */

    var initialize = function()
    {

        dom.call(this);
        this.dom.submit.on('click', { ev  :  'ev'}, this.proxy.submit);
    };


    /**
     * Submit functionality
     * @private
     */

    var submit = function(ev)
    {

        var blank       =  {};
            blank.text  =  this.dom.text.val() == '';

        // Prevent default if fields are blank
        blank.text  &&  ev.preventDefault();

        this.dom.text.css('border', '1px solid #FF2626').attr('placeholder', 'Please, enter a search term').on('click', function()
        {

            jQuery(this).css('border', '1px solid #CCC').attr('placeholder', 'Search...');
        });
    };


    return AdvancedSearch;
})();

