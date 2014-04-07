<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	

	<div id="primary" class="site-content full-width">
		<?php
		$images=get_post_meta($post->ID, 'gallery_for_page'); 
			if (!empty($images[0])):
			echo '<div class="post-image-big">';
			echo '<ul class="post-gallery">';
			foreach($images as $image){
				//echo $image[guid];
				echo '<li><img src="'.$image[guid].'"></li>';
			}
			echo '</ul>';
		?>
		</div>
		<script>
	jQuery(document).ready(function(){
	

	jQuery('.post-gallery').bxSlider({
	  auto: true,
	  mode: 'fade',
	  speed : 100,
	  pause : 2500,
	  nextText: '',
	  prevText: '',
	  autoControls: false,
	  captions: false,
	  pager: false,
	  controls: false
	});

	})
	
	
</script>
		
		<?php
			else:
			?>
			<div class='post-image-big'><?php the_post_thumbnail('full');?></div>
			<?php
			endif;
		?>
		
		
				

		
			<div id="content" role="main" >

			<?php while ( have_posts() ) : the_post(); ?>
				
				
				<!--<h1><?php //the_title(); ?></h1>
				<h2><?php //echo get_post_meta($post->ID, 'sub_heading', true); ?> </h2>-->
				<?php the_content(); ?>
				
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	
	<script>
		//jQuery('#content').columnize({ width:300 });
	</script>
<?php get_footer(); ?>