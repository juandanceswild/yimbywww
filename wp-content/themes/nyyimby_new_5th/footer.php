<?php
/**
 * Default Footer
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.1
 *
 * Last Revised: July 16, 2012
 */
?>

    <!-- End Template Content -->
<?php wp_footer(); ?>

<div class="ctr"><?php echo do_shortcode('[revealtemplate type="filename" admin="0"]'); ?></div>

<!-- Quantcast Tag -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h4 class="modal-title">YIMBY News</h4>
      </div>
       <?php echo do_shortcode('[mailchimpsf_form]'); ?>
    </div>
  </div>
</div>

<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/nicescroll.js"></script>

<!-- Modules -->
<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/TaxonomyStream.js"></script>
<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/ImageCycle.js"></script>
<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/AdvancedSearch.js"></script>
<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/SearchResults.js"></script>
<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/FixedSocial.js"></script>
<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/Sidebar.js"></script>


<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/social.js"></script>
<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/nicescroll.js"></script>
<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/inf.js"></script>
<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/cookie.js"></script>
<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/jscroll.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/nyyimby_new_5th/js/ny.js"></script>

<?php // i've just had it with this out of date bs v2, we're going to twitter bs or risk failure ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
var _qevents = _qevents || [];

(function() {
var elem = document.createElement('script');
elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
elem.async = true;
elem.type = "text/javascript";
var scpt = document.getElementsByTagName('script')[0];
scpt.parentNode.insertBefore(elem, scpt);
})();

_qevents.push({
qacct:"p-apSNtZC4hnJQR"
});

<?php if (!isset($_SESSION['popup'])) {
  $_SESSION['popup'] = true;
} ?>

<?php if ($_SESSION['popup']) { ?>
jQuery(window).load(function(){
  var ctr = 0;
  var oneminute = setInterval(
    function()
    {
      if (ctr < 1)
      {
        ctr++;
      }
      else
      {
        // console.log('one minute had passed');
        jQuery('.newsletter-button').trigger('click');
        clearInterval(oneminute);
      }
    },
    60000
  );
});
<?php $_SESSION['popup'] = false; ?>
<?php } ?>


(function(){
jQuery('p').each(function() {
    var $this = $(this);
    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
        $this.remove();
});
})();
</script>

<noscript>
<div class="hidden">
<img src="//pixel.quantserve.com/pixel/p-apSNtZC4hnJQR.gif" border="0" height="1" width="1" alt="Quantcast"/>
</div>
</noscript>
<!-- End Quantcast tag -->


<script>(function() {
        var _fbq = window._fbq || (window._fbq = []);
        if (!_fbq.loaded)
        { var fbds = document.createElement('script'); fbds.async = true; fbds.src = '//connect.facebook.net/en_US/fbds.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(fbds, s); _fbq.loaded = true; }
        _fbq.push(['addPixelId', '1455565568036018']);
    })();
    window._fbq = window._fbq || [];
    window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1455565568036018&ev=NoScript" /></noscript>

    <div class="newsletter-overlay"></div>
    <div class="newsletter-modal">
        <div class="newsletter-container">
            <h1>YIMBY News</h1>
            <h2>You have been reading YIMBY for 60 seconds.</h2>
            <p>That’s all the time it takes to read our Saturday newsletter, which summarizes the week’s Top 5 stories.</p>
            <p>To subscribe, please enter your email in the box below.</p>

            <form id="mailchimp2" action="/subscribe.php" method="POST">
                <span id="result2"></span>
                <input id="address2" name="email" type="email" placeholder="Newsletter signup">
                <input id="newsletter-submit" type="submit" value="« subscribe" />
            </form>

            <a href="#" class="close">Close</a>
        </div> <!-- // div.newsletter-container -->
    </div> <!-- // div.newsletter-modal -->

  </body>
</html>
