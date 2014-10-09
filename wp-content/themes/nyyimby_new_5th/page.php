<?php
/**
 * The template for displaying all pages.
 *
 * Template Name: Default Page THIS IS THE CONTACT PAGE TEMPLATE
 * Description: Page template with a content container and right sidebar
 *
 * @package WordPress
 * @subpackage WP-Bootstrap
 * @since WP-Bootstrap 0.1
 *
 * Last Revised: July 16, 2012
 */

get_header(); ?>

<div class="summerville">

    <div class="white pt-top">
        <div class="my-col col-md-3 visible-md visible-lg" id="main_tab">

        </div>

        <div class="my-col cx col-md-9">
            <div class="scroll_wrapper">
                <div class="col-lg-8 pl-no">

                    <div id="stuff" class="jj">
                        <div id="cx">
                <?php the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 visible-lg p-sm rb-gray">
                  <div class="my-col-noscroll ads-col pl-xs-lg" data-spy="affix">

                    <div id="ads"></div>

                    <br class="clr">
                  </div>
                  <br class="clr">
                </div>
                <br class="clr">
            </div>
            <br class="clr">
        </div>
        <br class="clr">
    </div>
    <br class="clr">
</div>


            </div>
        </div>
    </div>
    <div class="main hidden-phone" id="static_page">
        <div class="row-fluid">
            <div class="row-fluid col-sm-3" id="post_main_content">

                <?php while (have_posts()) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>

                    <p><?php the_content(); ?></p>
                <?php endwhile; ?>
                </div>

            </div>
            <div id="related_updates">
            </div>
            <div id="newsletter_signup_wrapper">
                <!-- Begin MailChimp Signup Form -->
                <link href="http://cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
                <style>
                    #mc_embed_signup {
                        background: transparent;
                        clear: left;
                        font: 14px Helvetica, Arial, sans-serif;
                    }
                </style>
                <div id="mc_embed_signup" class="tcmcpop-open">
                    <form
                        action="http://newyorkyimby.us7.list-manage.com/subscribe/post?u=ec79a308bdf0c8fcf2e250502&amp;id=d76c6a6290"
                        method="post" id="mc-embedded-subscribe-form"
                        name="mc-embedded-subscribe-form" class="validate" target="_blank"
                        novalidate>
                        <label for="mce-EMAIL">NEWSLETTER SIGN-UP:</label>
                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL"
                               placeholder="email address" required>

                        <div class="clear"><input type="submit" value="Subscribe"
                                                  name="subscribe" id="mc-embedded-subscribe"
                                                  class="button"></div>
                    </form>
                </div>
                <!--End mc_embed_signup-->
                <?php if (function_exists('adrotate_group')) echo adrotate_group(1); ?>
            </div>
        </div>
    </div>



    <style>
/*
        #related_updates {
            background-color: #FFFFFF;
        }

        #single_page #post_main_content h1 {
            font-weight: 100;
        }

        .contact_send {
            height: 33px;
            widht: 56px;
            border: none;
            background-color: #999896;
            color: #00000;
        }
*/
    </style>

<?php get_footer(); ?>
