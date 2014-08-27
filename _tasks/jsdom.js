
/**
 * Module dependencies and default settings
 */

var fs                =  require('fs')
  , jsdom             =  require('jsdom')
  , colors            =  require('colors');


var settings   =  {};
settings.url   =  'http://localhost/phpMyAdmin';

/**
 * Kick-off
 */

jsdom.env({
  url: "http://localhost/phpMyAdmin/",
  
  scripts: ["http://code.jquery.com/jquery.js"],
  
  done: function (errors, window) {
  
    var $ = window.$;
  
    $("a").each(function() {
      console.log( $(this) );
    });
  
  }
});
