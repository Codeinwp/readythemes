<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "bb7a206984d60011e9b5fe89bcea097f4c1fd392d3"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/footer.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/footer_2014-01-25-13.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><?php if(is_single()) { ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.jcarousel.min.js"></script>
<?php } ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cookie.js"></script>
<script src="//cdn.optimizely.com/js/342062650.js"></script>
<script type="text/javascript">

	//<![CDATA[
	jQuery(document).ready(function(jQuery) {
	
	jQuery("#topnav li").first().hide();
	if (!jQuery.cookie('refferer')) jQuery.cookie('refferer', document.referrer, { expires: 7, path: '/' });
	
	if (jQuery.cookie('refferer').indexOf("warriorforum")>0) {
	
	//jQuery(".themecontent h2").html('Welcome fellow <span style="color:red">Warrior</span>, get this premium theme for FREE');
//	jQuery(".themecontent h2.ptheme").html('This is a special offer for <span style="color:red">WarriorForum</span> members.');
//	jQuery(".blurbleft >span").html('We have a special offer for WarriorForum members <del>67</del> <strong style="color:red;">$55</strong>');
	}
	
	//console.log(jQuery.cookie('refferer'));
		jQuery(".scroll").click(function(event){		
			event.preventDefault();
			jQuery('html,body').animate({scrollTop:jQuery(this.hash).offset().top}, 500);
		});
	});
	<?php if(is_single()) { ?>
	jQuery(document).ready(function() {
		jQuery('#mycarousel').jcarousel();
		jQuery('#mycarousel1').jcarousel();
	});
	<?php } ?>
	//]]>
</script>

</div>
<!-- End Wrapper -->

<!-- footer -->
<div id="footer">
    <div class="container_12">
        
        <!-- footer column 1 -->
        <div class="grid_3">
            <h4>
                About Ready Themes
            </h4>
            <p>
                We design and develop Wordpress themes for those interested in earning money online. 
				All of our themes are researched and tested for the best possible results.  <a href="/about/">Learn more</a> about how Ready Themes got started. 
            </p>
			<p>
			<a href="/features/">View our theme features</a>
			</p>
        </div>
        <!-- end footer column 1 -->
        
        <!-- footer column 2 -->
        <div class="grid_3">
            <h4>
                Site Links
            </h4>
            <ul>
				<li><a href="/affiliates/" rel="nofollow">Affiliate Program</a></li>
				<li><a href="/category/blog/">Blog</a></li>
				<li><a href="/category/themes/">Wordpress Themes</a></li>
				<li><a href="/faq/" >Frequently Asked Questions</a></li>
				<li><a href="/terms/" rel="nofollow">Terms</a></li>
				<li><a href="/privacy/" rel="nofollow">Privacy Policy</a></li>
			</ul>
        </div>
        <!-- end footer column 2 -->
        
        <!-- footer column 3 -->
        <div class="grid_3">
            <h4>
                Support
            </h4>
            <p>
				We support all of our premium themes for those who have purchased them. 
				If you are in need of support, please open a <a href="/support/">support ticket</a> and we'll do our best to help.
            </p>
			<p>
				<a href="/support/" rel="nofollow">Click here to open a support ticket &raquo;</a>
			</p>
        </div>
        <!-- end footer column 3 -->
        
        <!-- footer column 4 -->
        <div class="grid_3">
            <h4>
                Connect
            </h4>
            <p>
                Stay up to date by following us on social networking platforms or subscribe to our newsletter.
            </p>
            <p>
				<form method="post" class="af-form-wrapper" action="http://www.aweber.com/scripts/addlead.pl"  >
				<input type="hidden" name="meta_web_form_id" value="569774437" />
				<input type="hidden" name="meta_split_id" value="" />
				<input type="hidden" name="listname" value="readythemes" />
				<input type="hidden" name="redirect" value="http://www.aweber.com/thankyou-coi.htm?m=text" id="redirect_026c628723444f54bec76a11da42933a" />
				
				<input type="hidden" name="meta_adtracking" value="Basic_Form" />
				<input type="hidden" name="meta_message" value="1" />
				<input type="hidden" name="meta_required" value="email" />
				
				<input type="hidden" name="meta_tooltip" value="" />
					<div class="form_field">
						<input class="newsletter_input" id="awf_field-38946378" type="text" name="email" onblur="if (this.value==''){this.value='Enter Your Email'};" onfocus="if(this.value=='Enter Your Email'){this.value=''};" value="Enter Your Email" />						
						<input class="newsletter_submit" type="submit">
                        <img src="http://forms.aweber.com/form/displays.htm?id=rGyc7OwsLMzs" alt="" />
					</div><!--/form field-->
				</form>
            </p>
        </div>
        <!-- end footer column 4 -->
        <div class="clear"></div>
        <!-- end of grid row -->
        </div>
        <!-- end of grid row -->
    </div>
</div>
<!-- end footer -->
<div class="footer-bottom">
	<div class="container_12">
		<div style="float:left; width:400px; margin-left:10px;">Copyright &copy; <?php echo date("Y"); ?> Ready Themes</div>
		<div style="float:right; width:400px; text-align:right; margin-right:10px;"><a href="#top" class="scroll"><img src="<?php bloginfo('template_directory'); ?>/images/top.png" border="0" /></a></div>
		<div class="clear"></div>
	</div>
</div>

<?php wp_footer(); ?>
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//cdn.zopim.com/?1JbsUYMbjtMOwoAxW8L3gukRyuZRHuTo';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->
<script type="text/javascript">


jQuery(document).ready(function() {
    jQuery('.blurbright :image').click(function() {
 
         _gaq.push(['_trackEvent', 'Click cumpara themes', jQuery("input[name='item_name']").val(), window.location.pathname]);

        
});

jQuery(".buynowbutton a").click(function(){
 var first = function(options, callback) {

	_gaq.push(['_trackEvent', 'Click cumpara tema', jQuery("input[name='item_name']").val(), window.location.pathname]);
	
	
	if (callback) {
		callback();
	}
};

var second = function() {
	document.forms['submitsus'].submit();
};

first({ceva: 'test'}, second);


})

jQuery("form[name='dap_direct_signup' :image]").click(function(e){
e.preventDefault();
 var first1 = function(options, callback) {
    _gaq.push(['_trackEvent', 'button_click', 'click_download', jQuery("input[name='productId']").val());
    _pa.track('downloadclick');
	
	
	
	if (callback) {
		callback();
	}
};

var second1 = function() {
str=jQuery("input[name='first_name']").val();
    if (str.indexOf("http") < 0)
    jQuery("form[name='dap_direct_signup']").submit();
    else
    return false;
};

first1({ceva: 'test'}, second1);


})


})

  function trimite(e){
 
  _gaq.push(['_trackEvent', 'Click cumpara', 'test', window.location.pathname]);
  
  document.forms['submitsus'].submit();

      
      return false;
   };  
   
</script>





<script type="text/javascript">
(function (tos) {
  window.setInterval(function () {
    tos = (function (t) {
      return t[0] == 50 ? (parseInt(t[1]) + 1) + ':00' : (t[1] || '0') + ':' + (parseInt(t[0]) + 10);
    })(tos.split(':').reverse());
    window.pageTracker ? pageTracker._trackEvent('Time', 'Log', tos) : _gaq.push(['_trackEvent', 'Time', 'Log', tos]);
  }, 10000);
})('00');
</script>
<script type="text/javascript">
  (function() {
    window._pa = window._pa || {};
    // _pa.orderId = "myCustomer@email.com"; // OPTIONAL: attach user email or order ID to conversions
    // _pa.revenue = "19.99"; // OPTIONAL: attach dynamic purchase values to conversions
    var pa = document.createElement('script'); pa.type = 'text/javascript'; pa.async = true;
    pa.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + "//tag.perfectaudience.com/serve/52239dc600fb3571e2000005.js";
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(pa, s);
  })();
</script>
<script type="text/javascript">
   var _mfq = _mfq || [];
   (function() {
       var mf = document.createElement("script"); mf.type = "text/javascript"; mf.async = true;
       mf.src = "//cdn.mouseflow.com/projects/6b91e790-5c07-4fcb-b158-b0128ac4a779.js";
       document.getElementsByTagName("head")[0].appendChild(mf);
   })();
</script>
</body>
</html>