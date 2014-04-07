<?php
/**
 * Template Name: Home Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>


			<?php
				$args = array(  
     'sort_order' => 'ASC'  
    ,'sort_column' => 'menu_order'  
    ,'hierarchical' => 1  
    ,'exclude' => ''  
    ,'include' => ''
    ,'meta_key' => ''  
    ,'meta_value' => ''  
    ,'authors' => ''  
    ,'child_of' => '6'  
    ,'parent' => -1  
    ,'exclude_tree' => ''  
    ,'number' => ''  
    ,'offset' => 0  
    ,'post_type' => 'page'  
);   
$pages = get_pages($args);  

function get_project_by_cat($category){
	$category = strtolower ($category);
	$project_args = array(  
			'numberposts'     	=> -1,  
			'tax_query' => array(  
				array(  
					'taxonomy' => 'project_category',  
					'field' => 'slug',  
					'terms' => $category,  
				)
						
			),
			'meta_query' => array(  
				array(  
					'key' => 'show_on_home',  
					'value' => '1',  
					'compare' => 'LIKE'  
				)
			),
			'orderby'         	=> 'post_date',  
			'order'           	=> 'DESC',
			'post_type'       	=> 'project',  
			'post_status'     	=> 'publish'  
		);  
  
	$project = get_posts($project_args);  
	shuffle($project);
	return ($project);

}


			
			?>
		<div class='home-block-wrapper'>
			<?php
			$i=1;
			foreach($pages as $post){ setup_postdata($post);    
			$project = get_project_by_cat(get_the_title());
			?>
				<div class='home-block bg-<?=$i?>'>
				<div class='left_block_bg'>
				</div>
				<div class='right_block_bg'>
				</div>
					<div class='home-block-img'>
					<h1 id='h1-home'><a href='<?php the_permalink(); ?>'><?php the_title();?></a></h1> 
					<h3 id='project-home'><a href="<?php echo get_permalink($project[0]->ID)?>"><?php echo $project[0]->post_title; ?></a></h3>
					<?php
					
					$img = get_post_meta($project[0]->ID, 'image_for_home', true);
					
					
					 echo "<img src='".$img['guid']."' />"; ?>
					</div>
				
				</div>
			
			<?php
			$i++;
			}
			?>
		</div>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>	
				<?php //the_content(); ?>
			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar( 'front' ); ?>
<?php get_footer(); ?>