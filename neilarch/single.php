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
			<a class='arrow' href='javascript:history.back();'></a>
				<menu>
					
					<ul>
						<li class='single-images'><a class='active' href='javascript:void(0);'>Images</a></li>
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
						<? if(get_post_meta(get_the_ID(), 'media', true)): ?>
						<li class='single-media'><a href='javascript:void(0);'>Media</a>
							<div class='media-text-block'><?php echo get_post_meta(get_the_ID(), 'media', true); ?></div>
						</li>
						<? endif; ?>
					</ul>
				</menu>
			</div>
			
			<div class='single-content-box'>
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
				echo '<img '.$firstchild.' src="'.$img["guid"].'" />';
			$i++;
			}

?>
			<?php endwhile; // end of the loop. ?>
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
		jQuery(".single-content-box").mCustomScrollbar({
					autoDraggerLength: false,
					mouseWheelPixels: 600,
					horizontalScroll:true,
					scrollButtons:{
						enable:false
					}
					
				});
	});
	</script>
	
<?php get_footer(); ?>