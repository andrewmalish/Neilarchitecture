<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="footer" role="contentinfo">
		<!--<div class='footer-menu'>	
			<?php //wp_nav_menu('menu=Footer Menu');?>
		</div>-->
		<div class="site-info">
			<div class='copy-info'>
				
				<div class='copyright'>
				T 03 9427 9833 <a href='mailto:&#111;&#102;&#102;&#105;&#099;&#101;&#064;&#110;&#101;&#105;&#108;&#097;&#114;&#099;&#104;&#105;&#116;&#101;&#099;&#116;&#117;&#114;&#101;&#046;&#099;&#111;&#109;&#046;&#097;&#117;'>&#111;&#102;&#102;&#105;&#099;&#101;&#064;&#110;&#101;&#105;&#108;&#097;&#114;&#099;&#104;&#105;&#116;&#101;&#099;&#116;&#117;&#114;&#101;&#046;&#099;&#111;&#109;&#046;&#097;&#117;</a>
				<span><BR />All content copyright Neil Architecture</span>
				</div>
				<div class='des-link'>
					<!--<a target='_blank' href='http://www.univers.com.au'></a>-->
					<a href='http://www.univers.com.au' id='credit'>
					<img src='<?php bloginfo('template_url'); ?>/images/univer_made_this.png' alt='Website designed and developed by Univers' title='Website designed and developed by Univers'/>
					</a>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>