<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Responsive Child
 * @author         Gerard Greenidge
 * @copyright      2013 - 2018 EDUNOW INC.
 * @license        license.txt
 * @version        Release: 1.5
 * @filesource     wp-content/themes/responsive-child/footer.php
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

/*
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = responsive_get_options();
?>
<?php responsive_wrapper_bottom(); // after wrapper content hook ?>
<div class="viewport-container">
</div></div><!-- end of #wrapper -->
<?php responsive_wrapper_end(); // after wrapper hook ?>
</div><!-- end of #container -->
<?php responsive_container_end(); // after container hook ?>

<div id="footer" class="clearfix">
	<?php responsive_footer_top(); ?>

	<div id="footer-wrapper">

		<?php get_sidebar( 'footer' ); ?>

		<?php get_sidebar( 'colophon' ); ?>

	</div><!-- end #footer-wrapper -->

	<?php responsive_footer_bottom(); ?>
</div><!-- end #footer -->

<!-- Begin #footer_bottom -->
<div id="footer_bottom" class="clearfix">
 <!-- Begin #footer_bottom_wrapper -->
 	<div id="footer_bottom_wrapper">
    <?php get_sidebar( 'colophon' ); ?>
   
   <!-- Begin .copyright -->
    <div class="grid col-380 copyright">
      <p>Sand Hill School at CHC<br /><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Children%27s+Health+Council%E2%80%8E+CA+94304&amp;aq=&amp;sll=37.441371,-122.173762&amp;sspn=0.010733,0.033023&amp;vpsrc=6&amp;gl=us&amp;ie=UTF8&amp;hq=Children%27s+Health+Council%E2%80%8E&amp;hnear=Palo+Alto,+California+94304&amp;cid=2678617662777582320&amp;ll=37.481397,-122.166252&amp;spn=0.095355,0.145912&amp;z=12&amp;iwloc=A" target="_blank">650 Clark Way, Palo Alto CA 94304</a> <br />Phone: 650.688.3605<br /> Email: <a href="mailto:info@sandhillschool.org">info@sandhillschool.org</a> <br /> <a href="https://www.chconline.org/privacy">Privacy Notice</a> <br /><br />
        &copy;<?php echo date('Y'); ?> Children's Health Council.<br /> All rights reserved.</p>
<!-- Facebook Pixel Code -->

<script>

!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};

if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;

t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '138096150009706');

fbq('track', 'PageView');

</script>

<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=186159898568661&ev=PageView&noscript=1" /></noscript>

<!-- DO NOT MODIFY -->

<!-- End Facebook Pixel Code -->
    </div>
    
    <!-- end of .copyright -->
    
    <!-- Begin Connect with us -->
    
    <div class="grid col-140 scroll-top">
	<a href="#scroll-top" title="<?php esc_attr_e( 'scroll to top', 'responsive' ); ?>">
      <?php _e( '&uarr;', 'responsive' ); ?>
      </a>	
    </div>
      <!-- End Connect with us -->
      
      <!-- begin .powered --> 
    <div class="grid col-380 fit powered"> <img src="https://widgets.guidestar.org/gximage2?o=8391398&l=v4"  style="vertical-align: top;" alt="Guidestar 2019 Platinum Award" /> <script type="text/javascript">
    gnp_request = {"slug" : "childrens-health-council-inc", "color-set" : 1 , "campaign" : 54};
</script>
<style> div.gnp_trb { visibility:hidden; } </style>
<script src="https://greatnonprofits.org/js/api/badge_toprated.js" type="text/javascript"> </script>

<div class="gnp_trb" id="gnp_trb">
    <a href="https://greatnonprofits.org/org/childrens-health-council-inc">
        <img src="//cdn.greatnonprofits.org//img/2016-top-rated-awards-badge-embed.png?id=349546" alt="CHILDRENS HEALTH COUNCIL INC Nonprofit Overview and Reviews on GreatNonprofits" title="2016 Top-rated nonprofits and charities" />
    </a> 
    <br/>
    <span class="gnp_lb">
        <a class="gnp_lb" href="https://greatnonprofits.org/org/childrens-health-council-inc" target="_blank">
            Volunteer. Donate. Review.
        </a>
    </span>
</div>
		<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true, gaId: 'UA-18813551-2'}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
    </div>
    
    
    <!-- end .powered --> 

    
  </div>
   <!-- End #footer_bottom_wrapper -->
 	 	<?php responsive_footer_bottom(); ?>
    </div>
<style>
@media screen and (max-width:650px){
div#maxbutton-1-container, div#maxbutton-2-container, div#maxbutton-3-container, div#maxbutton-4-container, div#maxbutton-5-container, div#maxbutton-6-container, div#maxbutton-7-container, div#maxbutton-8-container, div#maxbutton-9-container, div#maxbutton-10-container, div#maxbutton-11-container, div#maxbutton-12-container, div#maxbutton-13-container, div#maxbutton-14-container, div#maxbutton-15-container {
    float: none;
    margin-bottom: 7px;
}

}
</style>
<!-- End #footer_bottom -->
<?php responsive_footer_after(); ?>

<?php wp_footer(); ?>
</body>
</html>