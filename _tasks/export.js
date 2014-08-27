
/**
 * Module dependencies and default settings
 */

var fs      =  require('fs')
  , utils   =  require('utils')
  , casper  =  require('casper').create({
    clientScripts: ['jquery.min.js'],
    pageSettings: {
        webSecurityEnabled: false,
        userAgent: 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0'
    },
    viewPortSize: {
        width: 1024,
        height: 768
    },
    verbose: true,
    logLevel: 'error'
});


var settings          =  {};

settings.url          =  {};
settings.url.dev      =  'http://ny.dev';
settings.url.staging  =  'xxx';

settings.db           =  {};
settings.db.dev       =  'staging2_nyyimbyDB';
settings.db.staging   =  'staging2_nyyimbyDB';


casper.on('remote.message', function(msg)
{

    this.echo('remote message caught: ' + msg);
});


casper.on("page.error", function(msg, trace)
{

    this.echo("Page Error: " + msg, "ERROR");
});


casper.start('http://localhost/phpMyAdmin/', function(msg)
{

    this.echo( this.getTitle(), 'INFO' );
});


casper.then(function()
{

    this.page.switchToChildFrame('frame_content');
    this.click( 'a' );
    // this.page.switchToParentFrame();
});


casper.then(function()
{

    this.echo( this.getTitle(), 'INFO' );
});


casper.run();
