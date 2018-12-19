<?php get_header(); ?>	
	<div id="posts_cont">
		<?php if(get_option($shortname.'_disable_slideshow','') != "Yes") { ?>
		<div id="slideshow_cont">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slide-prev.png" alt="prev" class="slide_prev" />
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slide-next.png" alt="next" class="slide_next" />
		 
		<?php
		$slider_arr = array();
		$x = 0;
		$args = array(
			 
			 'post_type' => 'post',
			 'meta_key' => 'ex_show_in_slideshow',
			 'meta_value' => 'Yes',
			 'posts_per_page' => 99
			 );
		query_posts($args);
		while (have_posts()) : the_post(); ?>                        
			<div class="slide_box <?php if($x == 0) { echo 'slide_box_first'; } ?>">
			
				<?php if(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'youtube') { ?>
					<iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>
				<?php } elseif(get_post_meta( get_the_ID(), 'page_featured_type', true ) == 'vimeo') { ?>
					<iframe src="http://player.vimeo.com/video/<?php echo get_post_meta( get_the_ID(), 'page_video_id', true ); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=03b3fc" width="500" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
				<?php } else { ?>				
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide-image'); ?></a>
				<?php } ?>
				<div class="slider_text" onclick="location.href='<?php the_permalink(); ?>';">
				</div> <!-- //slider_text -->
				
			</div>
		<?php array_push($slider_arr,get_the_ID()); ?>
		<?php $x++; ?>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>                                    
		
	</div><!--//slideshow_cont-->
	
	
	<?php } ?>
	<div class="clear"></div>
	

<?php get_footer(); ?> 		
	