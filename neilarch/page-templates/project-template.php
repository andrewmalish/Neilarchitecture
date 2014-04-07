<?php
/**
 * Template Name: Projects template
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
	
		<div class='post_list_top'>
		<?php
		
		$page_id = get_the_id();
		if($page_id==62 || $page_id==6){
			$terms_id=3;
		}
		elseif($page_id==67){
			$terms_id=4;
		}
		
		elseif($page_id==73){
			$terms_id=6;
		}
		elseif($page_id==64){
			$terms_id=5;
		}
		$project_args = array(  
			'numberposts'     	=> -1,  
			'tax_query' => array(  
				array(  
					'taxonomy' => 'project_category',  
					'field' => 'id',  
					'terms' => $terms_id,  
				)
						
			),
			'orderby'         	=> 'post_date',  
			'order'           	=> 'ASC',  
			'post_type'       	=> 'project',  
			'post_status'     	=> 'publish'  
		);  
  
$projects = get_posts($project_args);  
	
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
		//echo '<div class="grid-layout"></div>';
		echo '<div class="project-box navigation">';
		
		//echo '<img class="navigation-img" src="http://s9.web-servers.com.au/~neilarch/dev/wp-content/themes/neilarch/images/projects-box-navigation-bg.png" />';
		
		foreach($pages as $page){
			if ($page->ID == $page_id)
				$isactive = "class='active-link'";
			elseif($page->ID == 62 && $page_id == 6)
				$isactive = "class='active-link'";
			else
				$isactive = "";
			echo '<a '.$isactive.' href="'.get_permalink($page->ID).'">'.$page->post_title.'</a>';
		}
	//	echo '<img style="navigation-img" src="http://s9.web-servers.com.au/~neilarch/dev/wp-content/themes/neilarch/images/projects-box-navigation-bg.png" />';
		echo '</div>';
	
		//for($i=0; $i<3; $i++){ //repeat the cycle
			foreach($projects as $project){ 
			
				if(!get_the_post_thumbnail($project->ID)){
					continue;
				}
				
				echo '<div class="project-box standart">';
				echo '<a href="'.get_permalink($project->ID).'"><div class="opacity"></div>'.get_the_post_thumbnail($project->ID, "project_preview").'</a>';
				echo '<a href="'.get_permalink($project->ID).'"><h3 class="projects-title">'.$project->post_title.'</h3></a>';
				echo '</div>';

			}  
		//}
		
		
		?>
		
		</div>
<script>
			jQuery(window).load(function(){
				function resize_block(){
				var needheight = jQuery(".project-box:nth-child(2) img").height();
				var needwidth = jQuery(".project-box:nth-child(2) img").width();
				jQuery(".project-box img").width(needwidth);
				jQuery(".project-box img").height(needheight);
				jQuery(".project-box").height(needheight);
				
				/*console.log('resazing >' + needheight);
				console.log('width >' + needwidth);*/
				}
				resize_block();
				
				jQuery(window).resize(function(){
					console.log('resize on project page works');
					resize_block();
				});
			});
</script>
	</div><!-- #primary -->
<?php get_footer(); ?>