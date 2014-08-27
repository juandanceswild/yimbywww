/**
 * IAS Trigger Extension
 * An IAS extension to show a trigger link to load the next page
 * http://infiniteajaxscroll.com
 *
 * This file is part of the Infinite AJAX Scroll package
 *
 * Copyright 2014 Webcreate (Jeroen Fiege)
 */

var IASTriggerExtension = function(options) {
    options = $.extend({}, this.defaults, options);

    this.ias = null;
    this.html = (options.html).replace('{text}', options.text);
    this.enabled = true;
    this.count = 0;
    this.offset = options.offset;
    this.$triggerNext = null;
    this.$triggerPrev = null;

    /**
     * Shows trigger for next page
     */
    this.showTriggerNext = function() {
        if (!this.enabled) {
            return true;
        }

        if (false === this.offset || ++this.count < this.offset) {
            return true;
        }

        var $trigger = this.$triggerNext || (this.$triggerNext = this.createTrigger(this.next));
        var $lastItem = this.ias.getLastItem();

        $lastItem.after($trigger);
        $trigger.fadeIn();

        return false;
    };

    /**
     * Shows trigger for previous page
     */
    this.showTriggerPrev = function() {
        if (!this.enabled) {
            return true;
        }

        var $trigger = this.$triggerPrev || (this.$triggerPrev = this.createTrigger(this.prev));
        var $firstItem = this.ias.getFirstItem();

        $firstItem.before($trigger);
        $trigger.fadeIn();

        return false;
    };

    /**
     * @param clickCallback
     * @returns {*|jQuery}
     */
    this.createTrigger = function(clickCallback) {
        var uid = (new Date()).getTime(),
            $trigger = $(this.html).attr('id', 'ias_trigger_' + uid);

        $trigger.hide();
        $trigger.on('click', $.proxy(clickCallback, this));

        return $trigger;
    };

    return this;
};

/**
 * @public
 * @param {object} ias
 */
IASTriggerExtension.prototype.bind = function(ias) {
    var self = this;

    this.ias = ias;

    try {
        ias.on('prev', $.proxy(this.showTriggerPrev, this), this.priority);
    } catch (exception) {}

    ias.on('next', $.proxy(this.showTriggerNext, this), this.priority);
    ias.on('rendered', function () { self.enabled = true; }, this.priority);
    ias.on('rendered', function()
    {

        var singlePageCycle = new ImageCycle();
        singlePageCycle.setupGalleryMode();
    });
};

/**
 * @public
 */
IASTriggerExtension.prototype.next = function() {
    this.enabled = false;
    this.ias.unbind();

    if (this.$triggerNext) {
        this.$triggerNext.remove();
        this.$triggerNext = null;
    }

    this.ias.next();
};

/**
 * @public
 */
IASTriggerExtension.prototype.prev = function() {
    this.enabled = false;
    this.ias.unbind();

    if (this.$triggerPrev) {
        this.$triggerPrev.remove();
        this.$triggerPrev = null;
    }

    this.ias.prev();
};

/**
 * @public
 */
IASTriggerExtension.prototype.defaults = {
    text: 'Load more items',
    html: '<div class="ias-trigger" style="text-align: center; cursor: pointer;"><a>{text}</a></div>',
    offset: 0
};

/**
 * @public
 * @type {number}
 */
IASTriggerExtension.prototype.priority = 1000;

/**
 * IAS Spinner Extension
 * An IAS extension to show a spinner when loading
 * http://infiniteajaxscroll.com
 *
 * This file is part of the Infinite AJAX Scroll package
 *
 * Copyright 2014 Webcreate (Jeroen Fiege)
 */

var IASSpinnerExtension = function(options) {
    options = $.extend({}, this.defaults, options);

    this.ias = null;
    this.uid = new Date().getTime();
    this.src = options.src;
    this.html = (options.html).replace('{src}', this.src);

    /**
     * Shows spinner
     */
    this.showSpinner = function() {
        var $spinner = this.getSpinner() || this.createSpinner(),
            $lastItem = this.ias.getLastItem();

        $lastItem.after($spinner);
        $spinner.fadeIn();
    };

    /**
     * Shows spinner
     */
    this.showSpinnerBefore = function() {
        var $spinner = this.getSpinner() || this.createSpinner(),
            $firstItem = this.ias.getFirstItem();

        $firstItem.before($spinner);
        $spinner.fadeIn();
    };

    /**
     * Removes spinner
     */
    this.removeSpinner = function() {
        if (this.hasSpinner()) {
            this.getSpinner().remove();
        }
    };

    /**
     * @returns {jQuery|boolean}
     */
    this.getSpinner = function() {
        var $spinner = $('#ias_spinner_' + this.uid);

        if ($spinner.size() > 0) {
            return $spinner;
        }

        return false;
    };

    /**
     * @returns {boolean}
     */
    this.hasSpinner = function() {
        var $spinner = $('#ias_spinner_' + this.uid);

        return ($spinner.size() > 0);
    };

    /**
     * @returns {jQuery}
     */
    this.createSpinner = function() {
        var $spinner = $(this.html).attr('id', 'ias_spinner_' + this.uid);

        $spinner.hide();

        return $spinner;
    };

    return this;
};

/**
 * @public
 */
IASSpinnerExtension.prototype.bind = function(ias) {
    this.ias = ias;

    ias.on('next', $.proxy(this.showSpinner, this));

    try {
        ias.on('prev', $.proxy(this.showSpinnerBefore, this));
    } catch (exception) {}

    ias.on('render', $.proxy(this.removeSpinner, this));
};

/**
 * @public
 */
IASSpinnerExtension.prototype.defaults = {
    src: 'data:image/gif;base64,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',
    html: '<div class="ias-spinner" style="text-align: center;"><img src="{src}"/></div>'
};

/**
 * IAS Paging Extension
 * An IAS extension providing additional events
 * http://infiniteajaxscroll.com
 *
 * This file is part of the Infinite AJAX Scroll package
 *
 * Copyright 2014 Webcreate (Jeroen Fiege)
 */

var IASPagingExtension = function() {
    this.ias = null;
    this.pagebreaks = [[0, document.location.toString()]];
    this.lastPageNum = 1;
    this.enabled = true;
    this.listeners = {
        pageChange: new IASCallbacks()
    };

    /**
     * Fires pageChange event
     *
     * @param currentScrollOffset
     * @param scrollThreshold
     */
    this.onScroll = function(currentScrollOffset, scrollThreshold) {
        if (!this.enabled) {
            return;
        }

        var ias = this.ias,
            currentPageNum = this.getCurrentPageNum(currentScrollOffset),
            currentPagebreak = this.getCurrentPagebreak(currentScrollOffset),
            urlPage;

        if (this.lastPageNum !== currentPageNum) {
            urlPage = currentPagebreak[1];

            ias.fire('pageChange', [currentPageNum, currentScrollOffset, urlPage]);
        }

        this.lastPageNum = currentPageNum;
    };

    /**
     * Keeps track of pagebreaks
     *
     * @param url
     */
    this.onNext = function(url) {
        var currentScrollOffset = this.ias.getCurrentScrollOffset(this.ias.$scrollContainer);

        this.pagebreaks.push([currentScrollOffset, url]);

        // trigger pageChange and update lastPageNum
        var currentPageNum = this.getCurrentPageNum(currentScrollOffset) + 1;

        this.ias.fire('pageChange', [currentPageNum, currentScrollOffset, url]);

        this.lastPageNum = currentPageNum;
    };

    /**
     * Keeps track of pagebreaks
     *
     * @param url
     */
    this.onPrev = function(url) {
        var self = this,
            ias = self.ias,
            currentScrollOffset = ias.getCurrentScrollOffset(ias.$scrollContainer),
            prevCurrentScrollOffset = currentScrollOffset - ias.$scrollContainer.height(),
            $firstItem = ias.getFirstItem();

        this.enabled = false;

        this.pagebreaks.unshift([0, url]);

        ias.one('rendered', function() {
            // update pagebreaks
            for (var i = 1, l = self.pagebreaks.length; i < l; i++) {
                self.pagebreaks[i][0] = self.pagebreaks[i][0] + $firstItem.offset().top;
            }

            // trigger pageChange and update lastPageNum
            var currentPageNum = self.getCurrentPageNum(prevCurrentScrollOffset) + 1;

            ias.fire('pageChange', [currentPageNum, prevCurrentScrollOffset, url]);

            self.lastPageNum = currentPageNum;

            self.enabled = true;
        });
    };

    return this;
};

/**
 * @public
 */
IASPagingExtension.prototype.initialize = function(ias) {
    this.ias = ias;

    // expose the extensions listeners
    jQuery.extend(ias.listeners, this.listeners);
};

/**
 * @public
 */
IASPagingExtension.prototype.bind = function(ias) {
    try {
        ias.on('prev', $.proxy(this.onPrev, this), this.priority);
    } catch (exception) {}

    ias.on('next', $.proxy(this.onNext, this), this.priority);
    ias.on('scroll', $.proxy(this.onScroll, this), this.priority);
};

/**
 * Returns current page number based on scroll offset
 *
 * @param {number} scrollOffset
 * @returns {number}
 */
IASPagingExtension.prototype.getCurrentPageNum = function(scrollOffset) {
    for (var i = (this.pagebreaks.length - 1); i > 0; i--) {
        if (scrollOffset > this.pagebreaks[i][0]) {
            return i + 1;
        }
    }

    return 1;
};

/**
 * Returns current pagebreak information based on scroll offset
 *
 * @param {number} scrollOffset
 * @returns {number}|null
 */
IASPagingExtension.prototype.getCurrentPagebreak = function(scrollOffset) {
    for (var i = (this.pagebreaks.length - 1); i >= 0; i--) {
        if (scrollOffset > this.pagebreaks[i][0]) {
            return this.pagebreaks[i];
        }
    }

    return null;
};

/**
 * @public
 * @type {number}
 */
IASPagingExtension.prototype.priority = 500;

/**
 * IAS History Extension
 * An IAS extension to enable browser history
 * http://infiniteajaxscroll.com
 *
 * This file is part of the Infinite AJAX Scroll package
 *
 * Copyright 2014 Webcreate (Jeroen Fiege)
 */

var IASHistoryExtension = function (options) {
    options = $.extend({}, this.defaults, options);

    this.ias = null;
    this.prevSelector = options.prev;
    this.prevUrl = null;
    this.listeners = {
        prev: new IASCallbacks()
    };

    /**
     * @private
     * @param pageNum
     * @param scrollOffset
     * @param url
     */
    this.onPageChange = function (pageNum, scrollOffset, url) {
        var state = {};

        if (!window.history || !window.history.replaceState) {
            return;
        }

        history.pushState(state, document.title, url);

        // Google Analytics
        _gaq.push(['_trackPageview', url]);

        this.updateList();
    };

    /**
     * Category -> Neighbourhoods
     */

    this.transition = function()
    {

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
     * Update the navigation list
     * @private
     */

    this.updateList = function()
    {

        var currentURL     =  window.location.href;
        var links          =  jQuery('div.media-body a');
        var currentActive  =  links.filter(function()
        {
            return $(this).attr('href') == currentURL;
        });
        var title          =  currentActive.text();

        // Update the title
        this.updateTitle(title);

        var elements      =  {};
        elements.visible  =  jQuery('div.media-body a:in-viewport');
        elements.above    =  jQuery('div.media-body a:above-the-top');
        elements.below    =  jQuery('div.media-body a:below-the-fold');


        setTimeout(function()
        {

            addthis_share.url    =  currentURL;
            addthis_share.title  =  currentActive.find('p').text();
            addthis.toolbox('.addthis_sharing_toolbox', addthis_config, addthis_share);

            if ( jQuery(window).width() < 1245 )
            {
                // jQuery('div.soc').last().appendTo('div.post-wrapper h4');

                var mobileOffsetLeft = jQuery('div.post h1').offset().left - jQuery('div.post h1').parent().offset().left
                jQuery('div.soc').css('position', 'absolute').attr('style', 'left: ' + mobileOffsetLeft + 'px !important;');
            }
            else
            {

                var desktopOffsetLeft = jQuery('div#cx').offset().left + jQuery('div#cx').width() - 22;
                jQuery('div.soc').attr('style', 'position: fixed; top: 78px; left: ' + desktopOffsetLeft + 'px !important');
            }

            jQuery(window).on('resize', function()
            {

                if ( jQuery(window).width() < 1245 )
                {
                    // jQuery('div.soc').last().appendTo('div.post-wrapper h4');

                    var mobileOffsetLeft = jQuery('div.post h1').offset().left - jQuery('div.post h1').parent().offset().left
                    jQuery('div.soc').css('position', 'absolute').attr('style', 'left: ' + mobileOffsetLeft + 'px !important;');
                }
                else
                {

                    var desktopOffsetLeft = jQuery('div#cx').offset().left + jQuery('div#cx').width() - 22;
                    jQuery('div.soc').attr('style', 'position: fixed; top: 78px; left: ' + desktopOffsetLeft + 'px !important');
                }
            });
        }, 3000);


        if ( currentActive.size() > 0 )
        {

            // this.reloadAds();

            links.find('p').removeClass('highlight');
            currentActive.find('p').addClass('highlight');


            elements.visible.attr('data-visible', 'true');
            elements.above.attr('data-visible', 'false');
            elements.below.attr('data-visible', 'false');

            if ( currentActive.attr('data-visible') === 'false' )
            {

                // Scroll to latest
                jQuery('div#sidebar_nav_inner').scrollTo( jQuery(currentActive), 600, { offset: -14 } );
            }
        }
    };


    /**
     * Update the title
     * @private
     */

    this.updateTitle = function(title)
    {

        window.document.title = title;
    };


    /**
     * Reload the ads
     * @private
     */
    this.reloadAds = function()
    {


        jQuery('div#related_updates').load(window.location.href + '  div#related_updates');
    };

    /**
     * @private
     * @param currentScrollOffset
     * @param scrollThreshold
     */
    this.onScroll = function (currentScrollOffset, scrollThreshold) {
        var firstItemScrollThreshold = this.getScrollThresholdFirstItem();

        if (!this.prevUrl) {
            return;
        }

        currentScrollOffset -= this.ias.$scrollContainer.height();

        if (currentScrollOffset <= firstItemScrollThreshold) {
            this.prev();
        }
    };

    /**
     * Returns the url for the next page
     *
     * @private
     */
    this.getPrevUrl = function (container) {
        if (!container) {
            container = this.ias.$container;
        }

        // always take the last matching item
        return $(this.prevSelector, container).last().attr('href');
    };

    /**
     * Returns scroll threshold. This threshold marks the line from where
     * IAS should start loading the next page.
     *
     * @private
     * @return {number}
     */
    this.getScrollThresholdFirstItem = function () {
        var $firstElement;

        $firstElement = this.ias.getFirstItem();

        // if the don't have a first element, the DOM might not have been loaded,
        // or the selector is invalid
        if (0 === $firstElement.size()) {
            return -1;
        }

        return ($firstElement.offset().top);
    };

    /**
     * Renders items
     *
     * @private
     * @param items
     * @param callback
     */
    this.renderBefore = function (items, callback) {
        var ias = this.ias,
            $firstItem = ias.getFirstItem(),
            count = 0;

        ias.fire('render', [items]);

        $(items).hide(); // at first, hide it so we can fade it in later

        $firstItem.before(items);

        $(items).fadeIn(400, function () {
            if (++count < items.length) {
                return;
            }

            ias.fire('rendered', [items]);

            if (callback) {
                callback();
            }
        });
    };

    return this;
};

/**
 * @public
 */
IASHistoryExtension.prototype.initialize = function (ias) {
    var self = this;

    this.ias = ias;

    // expose the extensions listeners
    jQuery.extend(ias.listeners, this.listeners);

    // expose prev method
    ias.prev = function() {
        return self.prev();
    };

    this.prevUrl = this.getPrevUrl();
};

/**
 * Bind to events
 *
 * @public
 * @param ias
 */
IASHistoryExtension.prototype.bind = function (ias) {
    var self = this;

    ias.on('pageChange', $.proxy(this.onPageChange, this));
    ias.on('scroll', $.proxy(this.onScroll, this));
    ias.on('ready', function () {
        var currentScrollOffset = ias.getCurrentScrollOffset(ias.$scrollContainer),
            firstItemScrollThreshold = self.getScrollThresholdFirstItem();

        currentScrollOffset -= ias.$scrollContainer.height();

        if (currentScrollOffset <= firstItemScrollThreshold) {
            self.prev();
        }
    });

    ias.on('ready', $.proxy(this.updateList, this));
};

/**
 * Load the prev page
 *
 * @public
 */
IASHistoryExtension.prototype.prev = function () {
    var url = this.prevUrl,
        self = this,
        ias = this.ias;

    if (!url) {
        return false;
    }

    ias.unbind();

    var promise = ias.fire('prev', [url]);

    promise.done(function () {
        ias.load(url, function (data, items) {
            self.renderBefore(items, function () {
                self.prevUrl = self.getPrevUrl(data);

                ias.bind();

                if (self.prevUrl) {
                    self.prev();
                }
            });
        });
    });

    promise.fail(function () {
        ias.bind();
    });

    return true;
};

/**
 * @public
 */
IASHistoryExtension.prototype.defaults = {
    prev: ".prev"
};

/**
 * IASCallbacks
 * http://infiniteajaxscroll.com
 *
 * This file is part of the Infinite AJAX Scroll package
 *
 * Copyright 2014 Webcreate (Jeroen Fiege)
 */

var IASCallbacks = function () {
    this.list = [];
    this.fireStack = [];
    this.isFiring = false;
    this.isDisabled = false;

    /**
     * Calls all added callbacks
     *
     * @private
     * @param args
     */
    this.fire = function (args) {
        var context = args[0],
            deferred = args[1],
            callbackArguments = args[2];
        this.isFiring = true;

        for (var i = 0, l = this.list.length; i < l; i++) {
            if (false === this.list[i].fn.apply(context, callbackArguments)) {
                deferred.reject();

                break;
            }
        }

        this.isFiring = false;

        deferred.resolve();

        if (this.fireStack.length) {
            this.fire(this.fireStack.shift());
        }
    };

    /**
     * Returns index of the callback in the list in a similar way as
     * the indexOf function.
     *
     * @param callback
     * @param {number} index index to start the search from
     * @returns {number}
     */
    this.inList = function (callback, index) {
        index = index || 0;

        for (var i = index, length = this.list.length; i < length; i++) {
            if (this.list[i].fn === callback || (callback.guid && this.list[i].fn.guid && callback.guid === this.list[i].fn.guid)) {
                return i;
            }
        }

        return -1;
    };

    return this;
};

IASCallbacks.prototype = {
    /**
     * Adds a callback
     *
     * @param callback
     * @returns {IASCallbacks}
     * @param priority
     */
    add: function (callback, priority) {
        var callbackObject = {fn: callback, priority: priority};

        priority = priority || 0;

        for (var i = 0, length = this.list.length; i < length; i++) {
            if (priority > this.list[i].priority) {
                this.list.splice(i, 0, callbackObject);

                return this;
            }
        }

        this.list.push(callbackObject);

        return this;
    },

    /**
     * Removes a callback
     *
     * @param callback
     * @returns {IASCallbacks}
     */
    remove: function (callback) {
        var index = 0;

        while (( index = this.inList(callback, index) ) > -1) {
            this.list.splice(index, 1);
        }

        return this;
    },

    /**
     * Checks if callback is added
     *
     * @param callback
     * @returns {*}
     */
    has: function (callback) {
        return (this.inList(callback) > -1);
    },


    /**
     * Calls callbacks with a context
     *
     * @param context
     * @param args
     * @returns {object|void}
     */
    fireWith: function (context, args) {
        var deferred = $.Deferred();

        if (this.isDisabled) {
            return deferred.reject();
        }

        args = args || [];
        args = [ context, deferred, args.slice ? args.slice() : args ];

        if (this.isFiring) {
            this.fireStack.push(args);
        } else {
            this.fire(args);
        }

        return deferred;
    },

    /**
     * Disable firing of new events
     */
    disable: function () {
        this.isDisabled = true;
    },

    /**
     * Enable firing of new events
     */
    enable: function () {
        this.isDisabled = false;
    }
};

/**
 * Infinite Ajax Scroll v2.1.1
 * A jQuery plugin for infinite scrolling
 * http://infiniteajaxscroll.com
 *
 * Commercial use requires one-time purchase of a commercial license
 * http://infiniteajaxscroll.com/docs/license.html
 *
 * Non-commercial use is licensed under the MIT License
 *
 * Copyright 2014 Webcreate (Jeroen Fiege)
 */

(function($) {

    'use strict';

    var UNDETERMINED_SCROLLOFFSET = -1;

    var IAS = function($element, options) {
        this.itemsContainerSelector = options.container;
        this.itemSelector = options.item;
        this.nextSelector = options.next;
        this.paginationSelector = options.pagination;
        this.$scrollContainer = $element;
        this.$itemsContainer = $(this.itemsContainerSelector);
        this.$container = (window === $element.get(0) ? $(document) : $element);
        this.defaultDelay = options.delay;
        this.negativeMargin = options.negativeMargin;
        this.nextUrl = null;
        this.isBound = false;
        this.listeners = {
            next:     new IASCallbacks(),
            load:     new IASCallbacks(),
            loaded:   new IASCallbacks(),
            render:   new IASCallbacks(),
            rendered: new IASCallbacks(),
            scroll:   new IASCallbacks(),
            noneLeft: new IASCallbacks(),
            ready:    new IASCallbacks()
        };
        this.extensions = [];

        /**
         * Scroll event handler
         *
         * Note: calls to this functions should be throttled
         *
         * @private
         */
        this.scrollHandler = function() {
            var currentScrollOffset = this.getCurrentScrollOffset(this.$scrollContainer),
                scrollThreshold = this.getScrollThreshold()
                ;

            // the throttle method can call the scrollHandler even thought we have called unbind()
            if (!this.isBound) {
                return;
            }

            // invalid scrollThreshold. The DOM might not have loaded yet...
            if (UNDETERMINED_SCROLLOFFSET == scrollThreshold) {
                return;
            }

            this.fire('scroll', [currentScrollOffset, scrollThreshold]);

            if (currentScrollOffset >= scrollThreshold) {
                this.next();
            }
        };

        /**
         * Returns the last item currently in the DOM
         *
         * @private
         * @returns {object}
         */
        this.getLastItem = function() {
            return $(this.itemSelector, this.$itemsContainer.get(0)).last();
        };

        /**
         * Returns the first item currently in the DOM
         *
         * @private
         * @returns {object}
         */
        this.getFirstItem = function() {
            return $(this.itemSelector, this.$itemsContainer.get(0)).first();
        };

        /**
         * Returns scroll threshold. This threshold marks the line from where
         * IAS should start loading the next page.
         *
         * @private
         * @param negativeMargin defaults to {this.negativeMargin}
         * @return {number}
         */
        this.getScrollThreshold = function(negativeMargin) {
            var $lastElement;

            negativeMargin = negativeMargin || this.negativeMargin;
            negativeMargin = (negativeMargin >= 0 ? negativeMargin * -1 : negativeMargin);

            $lastElement = this.getLastItem();

            // if the don't have a last element, the DOM might not have been loaded,
            // or the selector is invalid
            if (0 === $lastElement.size()) {
                return UNDETERMINED_SCROLLOFFSET;
            }

            return ($lastElement.offset().top + $lastElement.height() + negativeMargin);
        };

        /**
         * Returns current scroll offset for the given scroll container
         *
         * @private
         * @param $container
         * @returns {number}
         */
        this.getCurrentScrollOffset = function($container) {
            var scrollTop = 0,
                containerHeight = $container.height();

            if (window === $container.get(0))  {
                scrollTop = $container.scrollTop();
            } else {
                scrollTop = $container.offset().top;
            }

            // compensate for iPhone
            if (navigator.platform.indexOf("iPhone") != -1 || navigator.platform.indexOf("iPod") != -1) {
                containerHeight += 80;
            }

            return (scrollTop + containerHeight);
        };

        /**
         * Returns the url for the next page
         *
         * @private
         */
        this.getNextUrl = function(container) {
            if (!container) {
                container = this.$container;
            }

            // always take the last matching item
            return $(this.nextSelector, container).last().attr('href');
        };

        /**
         * Loads a page url
         *
         * @param url
         * @param callback
         * @param delay
         * @returns {object}        jsXhr object
         */
        this.load = function(url, callback, delay) {
            var self = this,
                $itemContainer,
                items = [],
                timeStart = +new Date(),
                timeDiff;

            delay = delay || this.defaultDelay;

            var loadEvent = {
                url: url
            };

            self.fire('load', [loadEvent]);

            return $.get(loadEvent.url, null, $.proxy(function(data) {
                $itemContainer = $(this.itemsContainerSelector, data).eq(0);
                if (0 === $itemContainer.length) {
                    $itemContainer = $(data).filter(this.itemsContainerSelector).eq(0);
                }

                if ($itemContainer) {
                    $itemContainer.find(this.itemSelector).each(function() {
                        items.push(this);
                    });
                }

                self.fire('loaded', [data, items]);

                if (callback) {
                    timeDiff = +new Date() - timeStart;
                    if (timeDiff < delay) {
                        setTimeout(function() {
                            callback.call(self, data, items);
                        }, delay - timeDiff);
                    } else {
                        callback.call(self, data, items);
                    }
                }

                jQuery('div#related_updates').load(window.location.href + '  div#related_updates');

            }, self), 'html');
        };

        /**
         * Renders items
         *
         * @param callback
         * @param items
         */
        this.render = function(items, callback) {
            var self = this,
                $lastItem = this.getLastItem(),
                count = 0;

            var promise = this.fire('render', [items]);

            promise.done(function() {
                $(items).hide(); // at first, hide it so we can fade it in later

                $lastItem.after(items);

                $(items).fadeIn(400, function() {
                    // complete callback get fired for each item,
                    // only act on the last item
                    if (++count < items.length) {
                        return;
                    }

                    self.fire('rendered', [items]);

                    if (callback) {
                        callback();
                    }
                });
            });
        };

        /**
         * Hides the pagination
         */
        this.hidePagination = function() {
            if (this.paginationSelector) {
                $(this.paginationSelector, this.$container).hide();
            }
        };

        /**
         * Restores the pagination
         */
        this.restorePagination = function() {
            if (this.paginationSelector) {
                $(this.paginationSelector, this.$container).show();
            }
        };

        /**
         * Throttles a method
         *
         * Adopted from Ben Alman's jQuery throttle / debounce plugin
         *
         * @param callback
         * @param delay
         * @return {object}
         */
        this.throttle = function(callback, delay) {
            var lastExecutionTime = 0,
                wrapper,
                timerId
                ;

            wrapper = function() {
                var that = this,
                    args = arguments,
                    diff = +new Date() - lastExecutionTime;

                function execute() {
                    lastExecutionTime = +new Date();
                    callback.apply(that, args);
                }

                if (!timerId) {
                    execute();
                } else {
                    clearTimeout(timerId);
                }

                if (diff > delay) {
                    execute();
                } else {
                    timerId = setTimeout(execute, delay);
                }
            };

            if ($.guid) {
                wrapper.guid = callback.guid = callback.guid || $.guid++;
            }

            return wrapper;
        };

        /**
         * Fires an event with the ability to cancel further processing. This
         * can be achieved by returning false in a listener.
         *
         * @param event
         * @param args
         * @returns {*}
         */
        this.fire = function(event, args) {
            return this.listeners[event].fireWith(this, args);
        };

        return this;
    };

    /**
     * Initialize IAS
     *
     * Note: Should be called when the document is ready
     *
     * @public
     */
    IAS.prototype.initialize = function() {
        var currentScrollOffset = this.getCurrentScrollOffset(this.$scrollContainer),
            scrollThreshold = this.getScrollThreshold();

        this.hidePagination();
        this.bind();

        for (var i = 0, l = this.extensions.length; i < l; i++) {
            this.extensions[i].bind(this);
        }

        this.fire('ready');

        this.nextUrl = this.getNextUrl();

        // start loading next page if content is shorter than page fold
        if (currentScrollOffset >= scrollThreshold) {
            this.next();
        }

        return this;
    };

    /**
     * Binds IAS to DOM events
     *
     * @public
     */
    IAS.prototype.bind = function() {
        if (this.isBound) {
            return;
        }

        this.$scrollContainer.on('scroll', $.proxy(this.throttle(this.scrollHandler, 150), this));

        this.isBound = true;
    };

    /**
     * Unbinds IAS to events
     *
     * @public
     */
    IAS.prototype.unbind = function() {
        if (!this.isBound) {
            return;
        }

        this.$scrollContainer.off('scroll', this.scrollHandler);

        this.isBound = false;
    };

    /**
     * Destroys IAS instance
     *
     * @public
     */
    IAS.prototype.destroy = function() {
        this.unbind();
    };

    /**
     * Registers an eventListener
     *
     * Note: chainable
     *
     * @public
     * @returns IAS
     */
    IAS.prototype.on = function(event, callback, priority) {
        if (typeof this.listeners[event] == 'undefined') {
            throw new Error('There is no event called "' + event + '"');
        }

        priority = priority || 0;

        this.listeners[event].add($.proxy(callback, this), priority);

        return this;
    };

    /**
     * Registers an eventListener which only gets
     * fired once.
     *
     * Note: chainable
     *
     * @public
     * @returns IAS
     */
    IAS.prototype.one = function(event, callback) {
        var self = this;

        var remover = function() {
            self.off(event, callback);
            self.off(event, remover);
        };

        this.on(event, callback);
        this.on(event, remover);

        return this;
    };

    /**
     * Removes an eventListener
     *
     * Note: chainable
     *
     * @public
     * @returns IAS
     */
    IAS.prototype.off = function(event, callback) {
        if (typeof this.listeners[event] == 'undefined') {
            throw new Error('There is no event called "' + event + '"');
        }

        this.listeners[event].remove(callback);

        return this;
    };

    /**
     * Load the next page
     *
     * @public
     */
    IAS.prototype.next = function() {
        var url = this.nextUrl,
            self = this;

        this.unbind();

        if (!url) {
            this.fire('noneLeft', [this.getLastItem()]);
            this.listeners['noneLeft'].disable(); // disable it so it only fires once

            self.bind();

            return false;
        }

        var promise = this.fire('next', [url]);

        promise.done(function() {
            self.load(url, function(data, items) {
                self.render(items, function() {
                    self.nextUrl = self.getNextUrl(data);

                    self.bind();
                });
            });
        });

        promise.fail(function() {
            self.bind();
        });

        return true;
    };

    /**
     * Adds an extension
     *
     * @public
     */
    IAS.prototype.extension = function(extension) {
        if (typeof extension['bind'] == 'undefined') {
            throw new Error('Extension doesn\'t have required method "bind"');
        }

        if (typeof extension['initialize'] != 'undefined') {
            extension.initialize(this);
        }

        this.extensions.push(extension);

        return this;
    };

    /**
     * Shortcut. Sets the window as scroll container.
     *
     * @public
     * @param option
     * @returns {*}
     */
    $.ias = function(option) {
        var $window = $(window);

        return $window.ias.apply($window, arguments);
    };

    /**
     * jQuery plugin initialization
     *
     * @public
     * @param option
     * @returns {*} the last IAS instance will be returned
     */
    $.fn.ias = function(option) {
        var args = Array.prototype.slice.call(arguments);
        var retval = this;

        this.each(function() {
            var $this = $(this),
                data = $this.data('ias'),
                options = $.extend({}, $.fn.ias.defaults, $this.data(), typeof option == 'object' && option)
                ;

            // set a new instance as data
            if (!data) {
                $this.data('ias', (data = new IAS($this, options)));

                $(document).ready($.proxy(data.initialize, data));
            }

            // when the plugin is called with a method
            if (typeof option === 'string') {
                if (typeof data[option] !== 'function') {
                    throw new Error('There is no method called "' + option + '"');
                }

                args.shift(); // remove first argument ('option')
                data[option].apply(data, args);

                if (option === 'destroy') {
                    $this.data('ias', null);
                }
            }

            retval = $this.data('ias');
        });

        return retval;
    };

    /**
     * Plugin defaults
     *
     * @public
     * @type {object}
     */
    $.fn.ias.defaults = {
        item: '.item',
        container: '.listing',
        next: '.next',
        pagination: false,
        delay: 600,
        negativeMargin: 10
    };
})(jQuery);


/**
 * Copyright (c) 2007-2014 Ariel Flesler - aflesler<a>gmail<d>com | http://flesler.blogspot.com
 * Licensed under MIT
 * @author Ariel Flesler
 * @version 1.4.12
 */
;(function(a){if(typeof define==='function'&&define.amd){define(['jquery'],a)}else{a(jQuery)}}(function($){var j=$.scrollTo=function(a,b,c){return $(window).scrollTo(a,b,c)};j.defaults={axis:'xy',duration:parseFloat($.fn.jquery)>=1.3?0:1,limit:true};j.window=function(a){return $(window)._scrollable()};$.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};$.fn.scrollTo=function(f,g,h){if(typeof g=='object'){h=g;g=0}if(typeof h=='function')h={onAfter:h};if(f=='max')f=9e9;h=$.extend({},j.defaults,h);g=g||h.duration;h.queue=h.queue&&h.axis.length>1;if(h.queue)g/=2;h.offset=both(h.offset);h.over=both(h.over);return this._scrollable().each(function(){if(f==null)return;var d=this,$elem=$(d),targ=f,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=win?$(targ):$(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=$(targ)).offset()}var e=$.isFunction(h.offset)&&h.offset(d,targ)||h.offset;$.each(h.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=j.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(h.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=e[pos]||0;if(h.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*h.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(h.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&h.queue){if(old!=attr[key])animate(h.onAfterFirst);delete attr[key]}});animate(h.onAfter);function animate(a){$elem.animate(attr,g,h.easing,a&&function(){a.call(this,targ,h)})}}).end()};j.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!$(a).is('html,body'))return a[scroll]-$(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return $.isFunction(a)||typeof a=='object'?a:{top:a,left:a}};return j}));

/*
 * Viewport - jQuery selectors for finding elements in viewport
 *
 * Copyright (c) 2008-2009 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *  http://www.appelsiini.net/projects/viewport
 *
 */
(function($) {

    $.belowthefold = function(element, settings) {
        // var fold = ($(window).height() + $(window).scrollTop()) - 40;
        var fold = ($(window).height() + $(window).scrollTop());
        return fold <= $(element).offset().top - settings.threshold;
    };

    $.abovethetop = function(element, settings) {
        var top = $(window).scrollTop();
        return top >= $(element).offset().top + $(element).height() - settings.threshold;
    };

    $.rightofscreen = function(element, settings) {
        var fold = $(window).width() + $(window).scrollLeft();
        return fold <= $(element).offset().left - settings.threshold;
    };

    $.leftofscreen = function(element, settings) {
        var left = $(window).scrollLeft();
        return left >= $(element).offset().left + $(element).width() - settings.threshold;
    };

    $.inviewport = function(element, settings) {
        return !$.rightofscreen(element, settings) && !$.leftofscreen(element, settings) && !$.belowthefold(element, settings) && !$.abovethetop(element, settings);
    };

    $.extend($.expr[':'], {
        "below-the-fold": function(a, i, m) {
            return $.belowthefold(a, {threshold : 0});
        },
        "above-the-top": function(a, i, m) {
            return $.abovethetop(a, {threshold : 0});
        },
        "left-of-screen": function(a, i, m) {
            return $.leftofscreen(a, {threshold : 0});
        },
        "right-of-screen": function(a, i, m) {
            return $.rightofscreen(a, {threshold : 0});
        },
        "in-viewport": function(a, i, m) {
            return $.inviewport(a, {threshold : 0});
        }
    });


})(jQuery);
