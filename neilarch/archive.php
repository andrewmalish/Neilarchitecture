<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>


	<?php
		
		the_post();
		
		
		
		echo $term_id = get_the_ID();  
		echo "<BR /><BR />";
		$taxonomy = 'project_category';  
		$term = get_the_terms( $term_id, $taxonomy ); 
		
		//echo $term = get_term( 59, 'project_category') ;
		echo '<pre>';
		print_r($term);
		echo '</pre>';
		$projects_args = array(  
			'numberposts'     	=> -1,  
			'tax_query' => array(  
				array(  
					'taxonomy' => 'project_category',  
					'field' => 'slug',  
					'terms' => $term,  
				)  
			),
			'orderby'         	=> 'post_date',  
			'order'           	=> 'ASC',  
			'post_type'       	=> 'projects',  
			'post_status'     	=> 'publish'  
		);  
  
$projects = get_posts($gdp_args); 

?>


	<section id="primary" class="site-content">
		<div id="content" role="main" style='border: 1px solid orange'>
		<?php
			foreach($projects as $project){
				echo "<pre>";
					print_r($project);
				echo "</pre>";
			}
		?>
	
		</div><!-- #content -->
	</section><!-- #primary -->


<?php get_footer(); ?>