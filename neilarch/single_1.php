<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content"  role="main">
		
		
			<?php while ( have_posts() ) : the_post(); ?>
			<div class='single-nav'>
			<h2><?php the_title();?></h2>
				<menu>
					
					<ul>
						<li class='single-images'><a class='active' href='javascript:void(0)'>Images</a></li>
						<li class='single-info'><a href='javascript:void(0);'>Info</a>
							<div class='info-text-block'>
							<?php the_content();?>
							<!---The Details--->
							<?php 
								$staff			= get_post_meta(get_the_ID(), 'staff', true); 
								$builder	 	= get_post_meta(get_the_ID(), 'builder', true); 
								$consultants 	= get_post_meta(get_the_ID(), 'consultants', true); 
								$photographer	= get_post_meta(get_the_ID(), 'photographer', true); 
								$year			= get_post_meta(get_the_ID(), 'year', true); 
							?>
							<?php if($staff!=''): ?>
							<h3>Staff</h3>
							<p><?=$staff?></p>
							<?php endif?>
							
							<?php if($builder!=''): ?>
							<h3>Builder</h3>
							<p><?=$builder?></p>
							<?php endif?>
							
							<?php if($consultants!=''): ?>
							<h3>Consultants</h3>
							<p><?=$consultants?></p>
							<?php endif?>
							
							<?php if($photographer!=''): ?>
							<h3>Photographer</h3>
							<p><?=$photographer?></p>
							<?php endif?>
							
							<?php if($year!=''): ?>
							<h3>Year</h3>
							<p><?=$year?></p>
							<?php endif?>
							
							</div>
						</li>
						<li class='single-media'><a href='javascript:void(0);'>Media</a>
							<div class='media-text-block'><?php echo get_post_meta(get_the_ID(), 'media', true); ?></div>
						</li>
					</ul>
				</menu>
			</div>
			
			<div class='single-content-box' style="white-space: nowrap;">
				<div class="slider"><!-- slides -->
					
					
				
<?php
			$imgs = get_post_meta(get_the_ID(), 'images');	
			$i=1;
			foreach($imgs as $img){
					if($i==1){
					$firstchild='class="firstchild"';
					}
					else{
						$firstchild='';
					}
				echo '<div class="slide"><img '.$firstchild.' src="'.$img["guid"].'" /></div>';
			$i++;
			}

?>
			<?php endwhile; // end of the loop. ?>
				</div>
		</div>
		</div><!-- #content -->
	</div><!-- #primary -->

	<script>
		jQuery(document).ready(function(){
			
			jQuery(".single-info > a").click(function(){
					
					jQuery(".media-text-block").hide();
					jQuery(".info-text-block").animate({"opacity" : "toggle"}, 200);
					var isclass = jQuery(this).find("a").attr('class');
					jQuery(".single-nav ul li a").removeClass('active');
					if(isclass!='active'){
						jQuery('.single-info').find("a").addClass('active');
					}
					
				});
			
		
			jQuery(".single-media  > a").click(function(){
					
					jQuery(".info-text-block").hide();
					jQuery(".media-text-block").animate({"opacity" : "toggle"}, 200);
					
					var isclass = jQuery(this).find("a").attr('class');
					jQuery(".single-nav ul li a").removeClass('active');
					if(isclass!='active'){
						jQuery('.single-media').find("a").addClass('active');
					}
					
				});
			
			jQuery(".single-images").click(function(){
				jQuery(".single-nav ul li a").removeClass('active');
				jQuery(this).find("a").addClass(' active');
				jQuery(".info-text-block").hide();
				jQuery(".media-text-block").hide();
			});
		
		});
	
		jQuery(window).load(function(){
		/*jQuery(".single-content-box").mCustomScrollbar({
					autoDraggerLength: false,
					horizontalScroll:true,
					scrollButtons:{
						enable:false
					}
					
				});*/
				jQuery('.single-content-box').iosSlider({
                snapToChildren: true,
				desktopClickDrag: true,
				/*scrollbar: true,
				scrollbarHide: false,
				scrollbarLocation: 'bottom',
				scrollbarHeight: '5px',
				scrollbarBackground: '#ffffff',
				scrollbarMargin: '0 0px 0px 0px',
				scrollbarBorderRadius:0,
				scrollbarOpacity: '1',*/
				autoSlide: false,
				keyboardControls: true,
				
            }); 
			jQuery('.single-content-box').bind('mousewheel DOMMouseScroll', function (e) {
			   var slider = jQuery(this);
				var currentSlide = slider.data('args').currentSlideNumber;
				var delta = extractDelta(e);
				this.scrollLeft += ( delta < 0 ? 1 : -1 ) * 0.2;
				e.preventDefault();
				if(delta > 0 && currentSlide != 1) {
					slider.iosSlider('goToSlide', currentSlide - 1);
				} else if (0 > delta && currentSlide != slider.data('args').numberOfSlider) {
					slider.iosSlider('goToSlide', currentSlide + 1);
				}
			});
			jQuery(window).resize();
	});
	function extractDelta(e)
		{
			if (e.wheelDelta)   return e.wheelDelta;
			if (e.detail)       return e.detail * -40;
			if (e.originalEvent && e.originalEvent.wheelDelta)
							return e.originalEvent.wheelDelta;
		}
	</script>
	
<?php get_footer(); ?>