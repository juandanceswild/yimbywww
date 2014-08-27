
/**
 * Module dependencies and default settings
 */

var fs                =  require('fs')
  , prompt            =  require('prompt')
  , colors            =  require('colors');

var settings          =  {};
    settings.dir      =  '../_db/';
    settings.dev      =  'ny.dev';
    settings.staging  =  'staging2.newyorkyimby.com';

console.log( 'DB repplace: ' + settings.dev + ' -> ' + settings.staging);


/**
 * Update URL strings in the selected DB file
 */

prompt.start();

prompt.get('DB', function(err, input) 
{


    fs.readFile(settings.dir + input.DB + '.sql', 'utf-8', function(err, content) 
    {

        if ( err )
            return console.log( 'Can\'t read file ' + input.DB.inverse );

        // var replace = content.replace(settings.dev, settings.staging);
        var replace = content.replace('newyorkyimby.com', 'ny.dev');

        fs.writeFile(settings.dir + input.DB + '.sql', replace, 'utf-8', function(err) 
        {

            if ( err )
                return console.log( 'Can\'t write file ' + input.DB.inverse );

            console.log( 'BOOM! Done.'.green )
        });
    });
});
