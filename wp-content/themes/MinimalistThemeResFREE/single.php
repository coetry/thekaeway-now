<?php get_header(); ?>	
<div id="content">
	<div class="container">
	
		<div id="single_cont">
		
			<!--<div class="single_left single_full">-->
			<div class="single_left">
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			
					<h1 class="single_title"><?php the_title(); ?></h1>
					
					<div class="single_inside_content">
					
						<?php the_content(); ?>
						
					</div><!--//single_inside_content-->
					<div class="next_prev_cont">
						<div class="left">
							 <?php previous_post_link('%link', '<i>Previous post</i><br />%title'); ?> 
						</div>
						<div class="right">
							 <?php next_post_link('%link', '<i>Next post</i><br />%title'); ?> 
						</div>
						<div class="clear"></div>
					</div><!--//next_prev_cont-->
					
					<br /><br />
					
					<?php //comments_template(); ?>							
				
				<?php endwhile; else: ?>
				
					<h3>Sorry, no posts matched your criteria.</h3>
				<?php endif; ?>                    																
			
			</div><!--//single_left-->
			
			
			
			<div class="clear"></div>
		
		</div><!--//single_cont-->
		
	</div><!--//container-->
</div><!--//content-->
<?php get_footer(); ?> 		